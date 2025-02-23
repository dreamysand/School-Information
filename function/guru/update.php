<?php
function update($guru, $request, $id)
{
	global $conn;
	if ($request == 'POST' && isset($_POST['nama']) && isset($_POST['jk']) && isset($_POST['jabatan']) && isset($_POST['mapel']) && isset($_FILES['gambar'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$jabatan = $_POST['jabatan'];
		$mapel = $_POST['mapel'];
		$hal = $_POST['hal'];
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
        
		$stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE namaguru=:nama AND id !=:id ");//buat template sql
		$stmt->bindParam(':nama', $nama);
	    $stmt->bindParam(':id', $id);
		$stmt->execute();
		$valueNama = $stmt->fetchColumn();
		$stmt = null; 
		// Input
		if ($valueNama>0) { ?>
			<script>
				alert("Data Sudah Ada");
				window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>";
			</script>
			<?php
		} else {
			$stmt = $conn->prepare("UPDATE $table SET namaguru=:nama, jk=:jk, idjabatan=:jabatan, mapel=:mapel, gambar=:gambar WHERE id=:id");
			$stmt->bindParam(':nama', $nama);
	        $stmt->bindParam(':jk', $jk);
	        $stmt->bindParam(':jabatan', $jabatan);
	        $stmt->bindParam(':mapel', $mapel);
	        $stmt->bindParam(':gambar', $gambar);
	        $stmt->bindParam(':id', $id);

			// Cek masuk
			if ($stmt->execute()/*execute() buat jalanin stmt yang diatas*/) {
				?>
				<script>
					alert("Data Berhasil Diubah");//Alert nis nya ditambahin
					window.location.href = "index.php?guru&start_show_hal=<?php echo $hal; ?>";
				</script>
	      		<?php
	      		$stmt = null;
	    	} else { 
	      		?>
	      		<script>
					alert("Data Gagal Diubah");//Alert namabahinnya gagal
					window.location.href = "index.php?guru&start_show_hal=<?php echo $hal; ?>";
				</script>
				<?php
			}
	    }
	    $conn = null;
	}
}
?>