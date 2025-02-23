<?php
function delete($guru, $id)
{
    global $conn;
    // Fungsi delete dari tabel guru
    if (isset($id) && isset($guru)) {
        $getHal = isset($_GET['start_show_hal']) ? $_GET['start_show_hal'] : 1;
        $table = 'guru';
        $stmt = $conn->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Mengatur ulang ID
            $conn->exec("SET @id = 0");
            $conn->exec("UPDATE $table SET id = @id := @id + 1 ORDER BY id ASC");
            ?>
            <script>
                alert("DATA DIHAPUS");
                window.location.href = "index.php?guru&start_show_hal=<?php echo $getHal; ?>";
            </script>
            <?php
            $stmt = null;
        } else {
            ?>
            <script>
                alert("GAGAL");
                window.location.href = "index.php?guru&start_show_hal=<?php echo $getHal; ?>";
            </script>
            <?php
        }
    }
}

?>