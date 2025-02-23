<?php
function update($request, $email)
{
    global $conn;
    if ($request == 'POST' && isset($_POST['id']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $table = 'admins';

        // Proses gambar crop dari base64 jika ada
        if (isset($_POST['cropped_image'])) {
            $cropped_image = $_POST['cropped_image'];

            // Decode base64 menjadi data binary
            $binary = preg_replace('#^data:image/\w+;base64,#i', '', $cropped_image);
            $image_data = base64_decode($binary);

            // Tentukan nama dan lokasi file baru
            $target_dir = "asset/";
            $image_name = uniqid() . '.png';
            $target_file = $target_dir . $image_name;

            // Simpan file hasil crop ke server
            if (file_put_contents($target_file, $image_data)) {
                $gambar = $target_file; // Simpan path gambar
            } else {
                echo "<script>alert('Simpan gambar yang di-crop gagal!'); window.location.href = 'index.php';</script>";
                return;
            }
        } else {
            // Jika gambar tidak di-crop, gunakan gambar lama atau placeholder
            $gambar = $_POST['gambar_lama'];
        }

        $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE email=:email AND id!=:id");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $valueEmail = $stmt->fetchColumn();
        $stmt = null;

        if ($valueEmail > 0) {
            echo "<script>alert('Data Sudah Ada'); window.location.href = 'index.php';</script>";
        } else {
            $stmt = $conn->prepare("UPDATE $table SET email=:email, username=:username, password=:password, img=:img WHERE id=:id");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':img', $gambar);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['gambar'] = $gambar;
                echo "<script>alert('Data Berhasil Diubah'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Data Gagal Diubah'); window.location.href = 'index.php';</script>";
            }
        }
    }
}
