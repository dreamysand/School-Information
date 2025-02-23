<?php
function read($email)
{
    global $conn;
    if (isset($email)) {
        $table = 'admins';
        $stmt = $conn->prepare("SELECT * FROM $table WHERE email=:email");
        $stmt->bindParam(":email", $email);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result)>0) {
                foreach ($result as $row) {
                    $admins = [
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'username' => $row['username'],
                        'img' => $row['img']
                    ];
                }
            }
            $stmt = null;
            return $admins;       
        }else {
            ?>
            <script>
                alert("Gagal Mengeksekusi Perintah");
                window.location.href="index.php";
            </script>
            <?php
        }
    }
}
?>