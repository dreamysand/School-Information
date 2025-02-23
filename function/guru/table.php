<?php
function read($guru)
{
    global $conn;
    if ($conn === null) {
        die('Koneksi tidak tersedia.');
    }
    function NormalisasiString($normalForm){
        // Menghapus semua karakter non-alfanumerik kecuali spasi
        $normalForm = preg_replace('/[^a-zA-Z0-9\s]/', '', $normalForm);
        // Mengganti spasi dengan wildcard untuk pencocokan
        $normalForm = str_replace(' ', '%', $normalForm);
        return $normalForm;
    }

    if (isset($guru)) {
        $data_per_hal = 5; // Jumlah data per halaman
        $table = 'guru';
        $start_show_hal = isset($_GET['start_show_hal']) ? (int)$_GET['start_show_hal'] : 1; // Halaman ke berapa
        $pos_awal_hal = ($start_show_hal > 1) ? ($start_show_hal * $data_per_hal) - $data_per_hal : 0;

        $prev = $start_show_hal - 1; // Halaman sebelumnya
        $next = $start_show_hal + 1; // Halaman berikutnya

        // Filter pencarian dan jenis kelamin
        $search = isset($_GET['search']) ? trim(NormalisasiString($_GET['search'])) : '';
        $jkFilter = isset($_GET['jk']) ? $_GET['jk'] : '';

        // Query dasar dengan JOIN antara tabel guru dan jabatan
        $sql = "
            SELECT guru.id, guru.namaguru, guru.jk, jabatan.jabatan, guru.mapel 
            FROM $table 
            JOIN jabatan ON guru.idjabatan = jabatan.idjabatan 
            WHERE 1=1
        ";

        $sql_total_baris = "
            SELECT COUNT(*) AS total 
            FROM $table 
            JOIN jabatan ON guru.idjabatan = jabatan.idjabatan 
            WHERE 1=1
        ";

        // Tambahkan filter pencarian jika ada
        if (!empty($search)) {
            $sql .= " AND guru.namaguru LIKE :search";
            $sql_total_baris .= " AND guru.namaguru LIKE :search";
        }
        if (!empty($jkFilter)) {
            $sql .= " AND guru.jk = :jk";
            $sql_total_baris .= " AND guru.jk = :jk";
        }

        // Tambahkan limit dan order
        $sql .= " ORDER BY guru.idjabatan LIMIT :pos_awal, :data_per_hal";

        // Persiapkan dan jalankan query
        $stmt = $conn->prepare($sql);
        $stmt_total = $conn->prepare($sql_total_baris);

        // Bind nilai untuk pencarian
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

        // Eksekusi query untuk data
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Eksekusi query untuk total baris
        $stmt_total->execute();
        $row_total_data = $stmt_total->fetch(PDO::FETCH_ASSOC);
        $total_baris = $row_total_data['total'];
        $total_halaman = ceil($total_baris / $data_per_hal); // Hitung total halaman
        return [
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
}
?>