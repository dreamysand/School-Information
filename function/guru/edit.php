<?php 
function edit($guru, $id)
{
    global $conn;
    // Edit data
    if (isset($id)) {
        $table = 'guru';
        $hal = isset($_GET['start_show_hal']) ? $_GET['start_show_hal'] : 1 ;
        $stmt = $conn->prepare("SELECT * FROM guru WHERE id=:id");
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result)>0) {
                foreach ($result as $row) {
                    $guru = [
                        'id' => $row['id'],
                        'nama' => $row['namaguru'],
                        'jk' => $row['jk'],
                        'jabatan' => $row['idjabatan'],
                        'mapel' => $row['mapel'],
                        'gambar' => $row['gambar']
                    ];
                }
            }
            $stmt = null;
            return $guru;       
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