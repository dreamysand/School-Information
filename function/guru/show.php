<?php
function show($guru, $id)
{
    global $conn;
    if (isset($id)) {
        $table = 'guru';
        $hal = isset($_GET['start_show_hal']) ? $_GET['start_show_hal'] : 1 ;
        $stmt = $conn->prepare("
            SELECT guru.namaguru, guru.jk, jabatan.jabatan, guru.mapel, guru.gambar
            FROM $table 
            JOIN jabatan ON guru.idjabatan = jabatan.idjabatan 
            WHERE guru.id=:id
            ");
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $guru = [
                    'nama' => $row['namaguru'],
                    'jk' => $row['jk'],
                    'jabatan' => $row['jabatan'],
                    'mapel' => $row['mapel'],
                    'gambar' => $row['gambar']
                ];
            }
            $stmt = null;
            return $guru;
        }else {
            echo "gagal";
        }
        $conn = null;
    }
}
?>