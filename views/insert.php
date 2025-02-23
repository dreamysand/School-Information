<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            position: relative;
            min-height: 100vh;
            padding-bottom: 200px;
            background-color: #e9ecef;
        }
        .navbar.bg-custom {
            background-color: #101018;
        }
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            margin-bottom: 0px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #07B620;
            color: white;
            font-weight: bold;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #078619;
            color: white;
        }
        .btn-back {
            background-color: #E90919;
            margin-right: 0.2rem;
            color: white;
        }
        .btn-back:hover {
            background-color: #B90411;
            color: white;
        }
        .footer-custom {
            background-color: #101018;
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
    <!-- Navbar -->
    <nav class="navbar bg-custom">
        <a class="navbar-brand text-white" href="#">DATA KELAS 11 RPL</a>
        <?php if (isset($_GET['guru'])): ?>
            <button class="btn btn-back" type="button" onclick="window.location.href='index.php?guru&start_show_hal=<?php echo $_GET['start_show_hal']; ?>'">
                <span>Back</span>
            </button>
        <?php else: ?>
            <button class="btn btn-back" type="button" onclick="window.location.href='index.php?start_show_hal=<?php echo $_GET['start_show_hal']; ?>&kelas=<?php echo $_GET['kelas']; ?>'">
                <span>Back</span>
            </button>
        <?php endif ?>
        
    </nav>

    <?php if (isset($_GET['guru'])) {
        include 'guru/insert.php';
    } else {
        include 'siswa/insert.php';
    }
     ?>

    <!-- Footer -->
    <footer class="footer-custom">
        &copy; 2024 | Data Kelas RPL
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
