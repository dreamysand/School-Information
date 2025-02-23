<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Profile <?php echo $row['nama'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            position: relative;
            min-height: 100vh;
            padding-bottom: 200px;
        }
        .navbar.bg-custom {
            background-color: #101018;
        }
        .profile-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            background-color: #6f42c1;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .profile-body {
            padding: 20px;
        }
        .profile-body img {
            border-radius: 8px;
            margin-right: 20px;
            width: 100%; 
            height: auto; 
            object-fit: cover;
        }
        .profile-body h5 {
            font-weight: bold;
        }
        .btn-back {
            background-color: #E90919;
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
        <a class="navbar-brand text-white" href="index.php">DATA KELAS 11 RPL</a>
        <button class="btn btn-back" type="button" onclick="window.location.href='index.php?guru'">
            <span>Back</span>
        </button>
    </nav>

    <!-- Profile Container -->
    <div class="container profile-container">
        <div class="profile-header">
            <h3>Profile Guru</h3>
        </div>
        <div class="profile-body">
            <img src="<?php echo $row['gambar'] ?>" alt="Profile Image">
            <h5>Nama Guru:</h5>
            <p><?php echo $row['nama'] ?></p>

            <h5>Jenis Kelamin:</h5>
            <p><?php echo $row['jk'] ?></p>

            <h5>Jabatan:</h5>
            <p><?php echo $row['jabatan'] ?></p>

            <h5>Mata Pelajaran:</h5>
            <p><?php echo $row['mapel'] ?></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-custom">
        &copy; 2024 Dean. Ya Udah Lah.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>