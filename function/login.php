<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT COUNT(*) FROM admins WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    $stmt = null;
    if ($result>0) {
        $stmt = $conn->prepare("SELECT * FROM admins WHERE email=:email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        	$pwdb = $row['password'];
	        $username = $row['username'];
	        if (password_verify($password, $pwdb)) {
	        	$_SESSION['loggedin'] = true;
	            $_SESSION['username'] = $username;
	            $_SESSION['email'] = $email;
	            $_SESSION['password'] = $password;
	            ?>
	            <script>
	                alert("Selamat Datang <?php echo $username?>");
	                window.location.href = "index.php";
	            </script>
	            <?php 
	        } else {
	            ?>
	            <script>
	                alert("Password salah");
	            </script>
	            <?php 
	        }
	        $stmt = null;
        }  
    } else {
        ?>
        <script>
            alert("Email Tidak ditemukan");
        </script>
        <?php
    }
    $conn = null;//nutup koneksi conn
}
?>