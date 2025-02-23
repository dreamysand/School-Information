<?php
function read()
{
    global $conn;
    function NormalisasiString($normalForm){
        // Menghapus semua karakter non-alfanumerik kecuali spasi
        $normalForm = preg_replace('/[^a-zA-Z0-9\s]/', '', $normalForm);
        // Mengganti spasi dengan wildcard untuk pencocokan
        $normalForm = str_replace(' ', '%', $normalForm);
        return $normalForm;
    }
    $pilihanKelas = (isset($_GET['kelas'])) ? $_GET['kelas'] : '11 RPL 1' ;
    $table = ($pilihanKelas == '11 RPL 1') ? 'nilai_mkk' : 'nilai_mkk2' ;
    $data_per_hal = 5;
    $start_show_hal = isset($_GET['start_show_hal']) ? (int)$_GET['start_show_hal'] : 1;
    $pos_awal_hal = ($start_show_hal > 1) ? ($start_show_hal * $data_per_hal) - $data_per_hal : 0;
    $prev = $start_show_hal - 1;
    $next = $start_show_hal + 1;

    // Ambil filter pencarian dan jenis kelamin dari parameter URL
    $search = isset($_GET['search']) ? trim(NormalisasiString($_GET['search'])) : '';
    $jkFilter = isset($_GET['jk']) ? $_GET['jk'] : '';

    // Query dasar
    $sql = "SELECT * FROM $table WHERE 1=1";
    $sql_total_baris = "SELECT COUNT(*) AS total FROM $table WHERE 1=1";

    // Tambahkan filter berdasarkan input `search` dan `jk` jika ada
    if (!empty($search)) {
        $sql .= " AND nama LIKE :search";
        $sql_total_baris .= " AND nama LIKE :search";
    }
    if (!empty($jkFilter)) {
        $sql .= " AND jeniskelamin = :jk";
        $sql_total_baris .= " AND jeniskelamin = :jk";
    }
    // Tambahkan urutan dan batasan untuk pagination
    $sql .= " ORDER BY nama LIMIT :pos_awal, :data_per_hal";

    // Persiapkan dan jalankan query untuk data
            $stmt = $conn->prepare($sql);
            $stmt_total = $conn->prepare($sql_total_baris);

            // Bind parameter pencarian dan filter jenis kelamin jika ada
            if (!empty($search)) {
                $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
                $stmt_total->bindValue(':search', "%$search%", PDO::PARAM_STR);
            }
            if (!empty($jkFilter)) {
                $stmt->bindValue(':jk', $jkFilter, PDO::PARAM_STR);
                $stmt_total->bindValue(':jk', $jkFilter, PDO::PARAM_STR);
            }

            // Bind nilai pagination
            $stmt->bindValue(':pos_awal', $pos_awal_hal, PDO::PARAM_INT);
            $stmt->bindValue(':data_per_hal', $data_per_hal, PDO::PARAM_INT);

            // Eksekusi query untuk mendapatkan data
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Eksekusi query untuk mendapatkan total baris
            $stmt_total->execute();
            $row_total_data = $stmt_total->fetch(PDO::FETCH_ASSOC);
            $total_baris = $row_total_data['total'];
            $total_halaman = ceil($total_baris / $data_per_hal); // Hitung total halaman
            return [
                'pilihanKelas' => $pilihanKelas,
                'total_halaman' => $total_halaman,
                'start_show_hal' => $start_show_hal,
                'result' => $result,
                'row_total_data' => $row_total_data,
                'next' => $next,
                'prev' => $prev,
                'search' => $search,
                'jkFilter' => $jkFilter,
            ];
}
?>