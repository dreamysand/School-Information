<?php 
function update($request, $nis)
{
	global $conn;
	if ($request == 'POST' && isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['kelas']) && isset($_POST['jk']) && isset($_POST['nilaipweb']) && isset($_POST['nilaipbo']) && isset($_POST['nilaipbo']) && isset($_POST['hal'])) {
		$nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jk = $_POST['jk'];
        $nilaipweb = $_POST['nilaipweb'];
        $nilaipbo = $_POST['nilaipbo'];
        $nilaidb = $_POST['nilaidb'];
        $hal = $_POST['hal'];
		$table = (isset($kelas)) ? 'nilai_mkk' : 'nilai_mkk2' ;
		$stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE nama=:nama AND nis!=:nis");//buat template sql
		$stmt->bindParam(':nama', $nama);
	    $stmt->bindParam(':nis', $nis);
		$stmt->execute();
		$valueNama = $stmt->fetchColumn();
		$stmt = null; 
		// Input
		if ($valueNama>0) {
			?>
			<script>
				alert("Data Sudah Ada");
				window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>";
			</script>
			<?php
		} else {
			$stmt = $conn->prepare("UPDATE $table SET nama=:nama, kelas=:kelas, jeniskelamin=:jeniskelamin, nilaipweb=:nilaipweb, nilaipbo=:nilaipbo, nilaidb=:nilaidb WHERE nis=:nis");
			$stmt->bindParam(':nama', $nama);
	        $stmt->bindParam(':kelas', $kelas);
	        $stmt->bindParam(':jeniskelamin', $jk);
	        $stmt->bindParam(':nilaipweb', $nilaipweb);
	        $stmt->bindParam(':nilaipbo', $nilaipbo);
	        $stmt->bindParam(':nilaidb', $nilaidb);
	        $stmt->bindParam(':nis', $nis);

			// Cek masuk
			if ($stmt->execute()/*execute() buat jalanin stmt yang diatas*/) {
				$conn->exec("SET @presence = 0");//Ngeset variabel buat si absennya
				$conn->exec("UPDATE $table SET presensi = @presence := @presence + 1 ORDER BY nama ASC");//Ngeupdate nilai presensi dengan nambahin 1 di presensi sebelumnya
				?>
				<script>
					alert("Data Berhasil Diubah");//Alert nis nya ditambahin
					window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $kelas; ?>";
				</script>
	      		<?php
	      		$stmt = null;
	    	} else { 
	      		?>
	      		<script>
					alert("Data Gagal Diubah");//Alert namabahinnya gagal
					window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $kelas; ?>";
				</script>
				<?php
			}
	    }
	    $conn = null;
	}
}
?>