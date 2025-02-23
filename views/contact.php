<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            position: relative;
            min-height: 100vh;
            padding-bottom: 100px; /* Adjusted padding for footer */
            background-color: #e9ecef;
        }
        nav.bg-custom {
            background-color: #101018;
        }
                .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" fill="white" height="30" width="30" viewBox="0 0 30 30"%3E%3Cpath stroke="white" stroke-width="2" d="M5 7h20M5 15h20M5 23h20"/%3E%3C/svg%3E');
        }
        .navbar-toggler:focus {
            box-shadow: none !important;
        }
        .sidebar .nav-link:hover {
            background-color: #343a40;
            transition: background-color 0.2s;
            border-radius: 5px;
        }
        .nav-pills .nav-link.active {
            background-color: #6f42c1;
            color: white;
            border-radius: 5px;
            font-weight: bold;
        }

        .nav-link[aria-expanded="true"] .bi-chevron-right {
            transform: rotate(90deg);
            transition: transform 0.3s;
        }
        .nav-link[aria-expanded="false"] .bi-chevron-right {
            transition: transform 0.3s;
        }
        .sidebar {
            width: 250px;
            background-color: #101018;
            position: fixed;
            top: 0;
            bottom: 0;
            left: -250px;
            transition: left 0.3s ease;
            z-index: 999;
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.5);
        }
        .sidebar.active {
            left: 0;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }
        .main-content {
            width: 100%;
        }
        .overlay.active {
            display: block;
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
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 50%;
            width: 150px; /* Ukuran gambar diperkecil */
            height: 150px;
            object-fit: cover;
        }
        .profile-body h5 {
            font-weight: bold;
            color: #6f42c1;
        }
        .btn-back {
            background-color: #E90919;
            color: white;
            margin-bottom: 10px;
        }
        .btn-back:hover {
            background-color: #B90411;
        }
        .btn-edit {
            background-color: #28a745;
            color: white;
            margin-top: 10px;
        }
        .btn-edit:hover {
            background-color: #218838;
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
        <button class="navbar-toggler" type="button" aria-controls="navbarFunc" aria-expanded="false" aria-label="Toggle navigation" id="sidebarToggle" style="border:0px;">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="overlay" id="overlay"></div>
        <!-- Sidebar -->
        <div class="sidebar p-3" id="sidebar">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#ordersCollapse" class="nav-link text-white d-flex align-items-center collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="ordersCollapse">
                        Kelas
                        <!-- Icon collapse -->
                        <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                    <div class="collapse" id="ordersCollapse">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?kelas=11 RPL 1">11 RPL 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?kelas=11 RPL 2">11 RPL 2</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#guruCollapse" class="nav-link text-white d-flex align-items-center collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="guruCollapse">
                        Guru
                        <!-- Icon collapse -->
                        <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                    <div class="collapse" id="guruCollapse">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?guru">Tabel Guru</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="profile.php" class="nav-link text-white">Profile</a>
                </li>
                <li>
                    <a href="contact.php" class="nav-link text-white active">Kontak</a>
                </li>
                <li>
                    <a href="logout.php" class="nav-link text-white">Log Out</a>
                </li>
            </ul>
        </div>

    <!-- Profile Container -->
    <div class="container profile-container main-content">
        <div class="profile-header">
            <h3>Kontak</h3>
        </div>
        <div class="profile-body">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.5547550173143!2d106.92356875164184!3d-6.198700395589217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698bd5a839a4e9%3A0x3eef143eb557e41!2sSMK%20NEGERI%2071%20Jakarta!5e0!3m2!1sen!2sid!4v1695668059301!5m2!1sen!2sid" 
              width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <h5>Instagram</h5>
            <p>Misal@gmail.com</p>

            <h5>No Telepon</h5>
            <p>08889037652</p>

            <h5>Website</h5>
            <p><a href="https://smkn71jakarta.sch.id/">SMKN 71 JAKARTA</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-custom">
        &copy; 2024 | Data Kelas RPL
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");
        const mainContent = document.getElementById("mainContent");
        const sidebarToggle = document.getElementById("sidebarToggle");

        sidebarToggle.addEventListener("click", function() {
            sidebar.classList.toggle("active");
            overlay.classList.toggle("active");
            mainContent.classList.toggle("shifted");
        });

        overlay.addEventListener("click", function() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
            mainContent.classList.remove("shifted");
        });
    </script>
</body>
</html>
