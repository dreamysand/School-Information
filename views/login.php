<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
        <h2 class="text-center mb-4">Login Data Nilai MKK</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required placeholder="Isi dengan email, contoh: example@example.com">
            </div>

            <!-- password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" name="login" class="btn btn-custom">Login</button>
            </div>
        </form>
        <p>Don't Have Account? <a href="register.php">Register Here</a></p>
        <p>Forget Your Password? <a href="forgotpass.php">Click Here</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
