<?php
function insert($request)
{
    global $conn;
    //INPUT
    //Data dari form
    if ($request == 'POST' && isset($_POST['nis']) && isset($_POST['nama']) && isset($_POST['kelas']) && isset($_POST['jk']) && isset($_POST['nilaipweb']) && isset($_POST['nilaipbo']) && isset($_POST['nilaipbo']) && isset($_POST['hal'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jk = $_POST['jk'];
        $nilaipweb = $_POST['nilaipweb'];
        $nilaipbo = $_POST['nilaipbo'];
        $nilaidb = $_POST['nilaidb'];
        $hal = $_POST['hal'];
        $getKelas = (isset($_GET['kelas'])) ? $_GET['kelas'] : '11 RPL 1' ;
        $getHal = (isset($_GET['start_show_hal'])) ? $_GET['start_show_hal'] : 1 ;
        $table = ($getKelas == '11 RPL 1') ? 'nilai_mkk' : 'nilai_mkk2';
        //Cek nis
        $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE nis=:nis");//buat template sql
        $stmt->bindParam(':nis', $nis);
        $stmt->execute();
        $valueNis = $stmt->fetchColumn();
        $stmt = null;
        // Cek nama
        $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE nama=:nama");//buat template sql
        $stmt->bindParam(':nama', $nama);
        $stmt->execute();
        $valueNama = $stmt->fetchColumn();
        $stmt = null; 
        if ($valueNis>0) { ?>
            <script>
                alert("NIS SUDAH ADA");
                window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $kelas; ?>";
            </script>
            <?php
        } else if ($valueNama>0) { ?>
            <script>
                alert("NAMA SUDAH ADA");
                window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $kelas; ?>";
            </script>
            <?php
        } else {
            $stmt = $conn->prepare("INSERT INTO $table (nis, nama, kelas, jeniskelamin, nilaipweb, nilaipbo, nilaidb) VALUES (:nis, :nama, :kelas, :jeniskelamin, :nilaipweb, :nilaipbo, :nilaidb)");//buat template sql
            $stmt->bindParam(':nis', $nis);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':kelas', $kelas);
            $stmt->bindParam(':jeniskelamin', $jk);
            $stmt->bindParam(':nilaipweb', $nilaipweb);
            $stmt->bindParam(':nilaipbo', $nilaipbo);
            $stmt->bindParam(':nilaidb', $nilaidb);
            //Cek masuk
            if ($stmt->execute()/*execute() buat jalanin stmt yang diatas*/) {
                $conn->exec("SET @presence = 0");//
                $conn->exec("UPDATE $table SET presensi = @presence := @presence + 1 ORDER BY nama ASC");
                ?>
                <script>
                    alert("DATA DITAMBAHKAN");//Alert nis nya ditambahin
                    window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $kelas; ?>";
                </script>
                <?php
                $stmt = null;
            }else { ?>
                <script>
                    alert("GAGAL");//Alert nambahinnya gagal
                    window.location.href = "index.php?start_show_hal=<?php echo $hal; ?>&kelas=<?php echo $kelas; ?>";
                </script>

            <?php
            }
            $stmt = null;
        }
    $conn = null;
    }
}
?>