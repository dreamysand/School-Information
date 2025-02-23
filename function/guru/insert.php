<?php 
function insert($guru, $request)
{
    global $conn;
    
    if ($request == 'POST' && isset($_POST['nama']) && isset($_POST['jk']) && isset($_POST['jabatan']) && isset($_POST['mapel'])) {
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $jabatan = $_POST['jabatan'];
        $mapel = $_POST['mapel'];
        $hal = $_POST['hal'];
        $getHal = isset($_GET['start_show_hal']) ? $_GET['start_show_hal'] : 1;
        $table = 'guru';

        // Proses upload gambar
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
            $target_dir = "asset/";
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Cek tipe file yang diizinkan (jpg, jpeg, png, gif)
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    $gambar = $target_file; // Simpan path gambar
                } else {
                    ?>
                    <script>
                        alert("Upload gambar gagal!");
                        window.location.href = "index.php?guru&start_show_hal=<?php echo $hal; ?>";
                    </script>
                    <?php
                    return; // Hentikan eksekusi jika upload gagal
                }
            } else {
                ?>
                <script>
                    alert("Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan!");
                    window.location.href = "index.php?guru&start_show_hal=<?php echo $hal; ?>";
                </script>
                <?php
                return; // Hentikan eksekusi jika tipe file tidak sesuai
            }
        } else {
            $gambar = ''; // Jika tidak ada file gambar, kosongkan path gambar
        }

        // Cek apakah nama guru sudah ada di database
        $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE namaguru=:namaguru");
        $stmt->bindParam(":namaguru", $nama);
        $stmt->execute();
        $valueNama = $stmt->fetchColumn();
        $stmt = null; 

        if ($valueNama > 0) { ?>
            <script>
                alert("NAMA SUDAH ADA");
                window.location.href = "index.php?guru&start_show_hal=<?php echo $hal; ?>";
            </script>
        <?php
        } else {
            // Masukkan data guru ke database
            $stmt = $conn->prepare("INSERT INTO $table (namaguru, jk, idjabatan, mapel, gambar) VALUES (:namaguru, :jk, :jabatan, :mapel, :gambar)");
            $stmt->bindParam(":namaguru", $nama);
            $stmt->bindParam(":jk", $jk);
            $stmt->bindParam(":jabatan", $jabatan);
            $stmt->bindParam(":mapel", $mapel);
            $stmt->bindParam(":gambar", $gambar);
                
            // Eksekusi query
            if ($stmt->execute()) {
                ?>
                <script>
                    alert("DATA DITAMBAHKAN");
                    window.location.href = "index.php?guru&start_show_hal=<?php echo $hal; ?>";
                </script>
                <?php
            } else { ?>
                <script>
                    alert("GAGAL MENAMBAHKAN DATA");
                    window.location.href = "index.php?guru&start_show_hal=<?php echo $hal; ?>";
                </script>
            <?php
            }
            $stmt = null; 
        }

        $conn = null; 
    }
}
?>
