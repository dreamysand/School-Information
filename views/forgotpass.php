<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #6f42c1;
            color: white;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #652CCD;
            color: white;
        }
        .btn-back {
            background-color: #6f42c1;
            margin-right: 0.2rem;
            color: white;
        }
        .btn-back:hover {
            background-color: #652CCD;
            color: white;
        }
        .footer-custom {
            background-color: orange;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Form Container -->
    <div class="container form-container">
        <h2 class="text-center mb-4">Forgot Password Data Nilai MKK</h2>
        <?php if (!isset($_SESSION['reset']) || $_SESSION['reset'] == 1) { ?>
            <!-- Form untuk memasukkan email -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required placeholder="Masukkan email Anda">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-custom">Kirim</button>
                </div>
            </form>
        <?php } elseif ($_SESSION['reset'] == 2) { ?>
            <!-- Form untuk reset password -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmpassword" class="form-label">Konfirmasi Password:</label>
                    <input type="password" class="form-control" name="confirmpassword" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-custom">Reset Password</button>
                </div>
            </form>
        <?php } ?>
        <?php 
        if (isset($_SERVER['REQUEST_METHOD'])=='POST' && isset($_POST['sesi1'])) {
            ?>
            <script>
                window.location.href = 'login.php';
            </script>
            <?php
        } elseif (isset($_SERVER['REQUEST_METHOD'])=='POST' && isset($_POST['sesi2'])) {
            $_SESSION['reset']=1;
            ?>
            <script>
                window.location.href = 'forgotpass.php';
            </script>
            <?php
        }
         ?>
        <form method="post">
            <button class="btn btn-back mt-3" type="submit" name="<?php if (!isset($_SESSION['reset']) || $_SESSION['reset']==1) {
                echo "sesi1";
            } else {
                echo "sesi2";
            } ?>">Back</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
