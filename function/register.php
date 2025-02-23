<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT COUNT(*) FROM admins WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $valueEmail = $stmt->fetchColumn();
    $stmt = null;
    if ($valueEmail>0) {
        ?>
        <script>
            alert("Email Sudah Ada");
        </script>
        <?php
    } else {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO admins (email, username, password) VALUES (:email, :username, :password)");//buat template sql
        $stmt->bindParam(":email", $email);//input value ke template sql
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $passwordhash);
        //Cek masuk
        if ($stmt->execute()) {
            ?>
            <script>
                alert("<?php echo $username ?> Berhasil Terdaftar");
                window.location.href = "login.php";
            </script>
            <?php
        }else { 
            ?>
            <script>
                alert("Gagal Mendaftar");
            </script>
            <?php
        }
        $stmt = null; 
    }
    $conn = null;//nutup koneksi conn
}
?>