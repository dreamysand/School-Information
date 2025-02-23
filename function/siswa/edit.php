<?php
// Edit data
function edit($nis)
{
    global $conn;
    if (isset($nis)) {
        $getKelas = (isset($_GET['kelas'])) ? $_GET['kelas'] : '11 RPL 1' ;
        $hal = (isset($_GET['start_show_hal'])) ? $_GET['start_show_hal'] : 1 ;
        $table = ($getKelas == '11 RPL 1') ? 'nilai_mkk' : 'nilai_mkk2' ;
        $stmt = $conn->prepare("SELECT * FROM $table WHERE nis=:nis");
        $stmt->bindParam(":nis", $nis);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result)>0) {
                foreach ($result as $row) {
                    $siswa = [
                        'nis' => $row['nis'],
                        'nama' => $row['nama'],
                        'kelas' => $row['kelas'],
                        'jk' => $row['jeniskelamin'],
                        'nilaipweb' => $row['nilaipweb'],
                        'nilaipbo' => $row['nilaipbo'],
                        'nilaidb' => $row['nilaidb'],
                    ];
                }
            }
            $stmt = null;
            return $siswa;       
        }else {
            ?>
            <script>
                alert("Gagal Mengeksekusi Perintah");
                window.location.href="index.php";
            </script>
            <?php
        }
    }
}

?>