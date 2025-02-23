<?php
// Tahap 1: Memverifikasi email
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT id FROM admins WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;

    if ($id) {
        $_SESSION['reset_id'] = $id;
        $_SESSION['reset'] = 2; // Menandakan tahap reset password
    } else {
        ?>
        <script>
            alert("Email Tidak Ada");
        </script>
        <?php
    }
}

// Tahap 2: Memproses reset password
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
    if (isset($_SESSION['reset']) && $_SESSION['reset'] == 2) {
        $id = $_SESSION['reset_id'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($password === $confirmpassword) {
            // Hash password dan update database
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE admins SET password=:password WHERE id=:id");
            $stmt->bindParam(":password", $passwordHash);
            $stmt->bindParam(":id", $id);
            if ($stmt->execute()) {
                ?>
                <script>
                    alert("Password Berhasil Direset");
                    window.location.href = "login.php"
                </script>
                <?php
                session_unset();
                session_destroy();
            } else {
                ?>
                <script>
                    alert("Password Gagal Direset");
                </script>
                <?php
            }
            $stmt = null;
        } else {
            ?>
            <script>
                alert("Password Gagal Dikonfirmasi");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Sesi Gagal");
        </script>
        <?php
    }
}

$conn = null;
?>