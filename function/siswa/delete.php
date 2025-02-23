<?php
function delete($nis)
{
    global $conn;
    if (isset($nis)) {
        $getKelas = (isset($_GET['kelas'])) ? $_GET['kelas'] : '11 RPL 1' ;
        $hal = (isset($_GET['start_show_hal'])) ? $_GET['start_show_hal'] : '' ;
        $table = ($getKelas == '11 RPL 1') ? 'nilai_mkk' : 'nilai_mkk2';
        $sql = "DELETE FROM $table WHERE nis = :nis";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nis', $nis);
        if ($stmt->execute()) {
            $conn->exec("SET @presence = 0");
            $conn->exec("UPDATE $table SET presensi = @presence := @presence + 1 ORDER BY nama ASC");
            ?>
            <script>
                alert("DATA DIHAPUS");
                window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $getKelas; ?>";
            </script>
            <?php
            $stmt = null;
        } else {
            ?>
            <script>
                alert("DATA GAGAL DIHAPUS");
                window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $getKelas; ?>";
            </script>
            <?php
        }
    }
}
?>