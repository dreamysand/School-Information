<?php       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            position: relative;
            min-height: 100vh;
            padding-bottom: 300px;
            background-color: #e9ecef;
        }
        nav.bg-custom {
            background-color: #101018;
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

        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }

        .main-content.shifted {
            margin-left: 250px;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" fill="white" height="30" width="30" viewBox="0 0 30 30"%3E%3Cpath stroke="white" stroke-width="2" d="M5 7h20M5 15h20M5 23h20"/%3E%3C/svg%3E');
        }
        .navbar-toggler:focus {
            box-shadow: none !important;
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
        .overlay.active {
            display: block;
        }
        .table-custom {
            color: white;
            border-color: black;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table-custom th {
            background-color: red;
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
        .pagination li a {
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .pagination a.active {
            background-color: red; /* Atau warna lain sesuai keinginan */
            color: white; /* Mengubah warna teks agar terlihat jelas */
        }

        .main-content {
            width: 100%;
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
        @media (max-width: 600px) {
            table {
                font-size: 70%;
            }
            select {
                width: 50%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Atas  -->
    <nav class="navbar bg-custom">
        <a class="navbar-brand text-white" href="index.php">DATA KELAS 11 RPL</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarFunc" aria-expanded="false" aria-label="Toggle navigation" id="sidebarToggle" style="border:0px;">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="overlay" id="overlay"></div>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" id="sidebar">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white <?php if (!isset($_GET['kelas']) && !isset($_GET['guru'])) {
                        echo 'active';
                    } ?>">Home</a>
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
                                <a class="nav-link text-white <?php if (isset($_GET['kelas']) && $_GET['kelas'] == '11 RPL 1') {
                                    echo 'active';
                                } ?>" href="index.php?kelas=11 RPL 1">11 RPL 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white <?php if (isset($_GET['kelas']) && $_GET['kelas'] == '11 RPL 2') {
                                    echo 'active';
                                } ?>" href="index.php?kelas=11 RPL 2">11 RPL 2</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#toolsCollapse" class="nav-link text-white d-flex align-items-center collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="toolsCollapse">
                        Tools
                        <!-- Icon collapse -->
                        <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                    <div class="collapse" id="toolsCollapse">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <?php if (isset($_GET['guru'])): ?>
                                    <a class="nav-link text-white" href="insert.php?guru&action=insert&start_show_hal=<?php echo $start_show_hal; ?>">Insert To Guru</a>
                                <?php else: ?>
                                    <?php if ($pilihanKelas=='11 RPL 1'): ?>
                                        <a class="nav-link text-white" href="insert.php?action=insert&start_show_hal=<?php echo $start_show_hal; ?>&kelas=<?php echo $pilihanKelas ?>">Insert To <?php echo $pilihanKelas ?></a>
                                    <?php else: ?>
                                        <a class="nav-link text-white" href="insert.php?action=insert&start_show_hal=<?php echo $start_show_hal; ?>&kelas=<?php echo $pilihanKelas ?>">Insert To <?php echo $pilihanKelas ?></a>
                                    <?php endif ?>
                                <?php endif ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?kelas=11 RPL 2">Drop All Record</a>
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
                                <a class="nav-link text-white <?php if (isset($_GET['guru'])) {
                                    echo "active";
                                } ?>" href="index.php?guru">Tabel Guru</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="profile.php" class="nav-link text-white">Profile</a>
                </li>
                <li>
                    <a href="contact.php" class="nav-link text-white">Kontak</a>
                </li>
                <li>
                    <a href="logout.php" class="nav-link text-white">Log Out</a>
                </li>
            </ul>
        </div>
        <!-- Main content area -->
        <div class="main-content p-4" id="mainContent">
            <!-- Search bar dan Filter-->
            <div class="d-flex justify-content-between mb-3">
                <div class="input-group" style="max-width: 300px;">
                    <?php if (isset($_GET['guru'])): ?>
                        <form method="get" action="" class="d-flex">
                            <input type="text" name="guru" hidden>
                            <input type="text" name="jk" hidden value="<?php if (isset($_GET['jk'])) {
                                echo $jkFilter;
                            } else {
                                echo '';
                            } ?>">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" name="search">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    <?php else: ?>
                        <form method="get" action="" class="d-flex">
                            <input type="text" name="kelas" hidden value="<?php echo $pilihanKelas ?>">
                            <input type="text" name="jk" hidden value="<?php if (isset($_GET['jk'])) {
                                echo $jkFilter;
                            } else {
                                echo '';
                            } ?>">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" name="search">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    <?php endif ?>
                </div>
                <?php if (isset($_GET['guru'])): ?>
                    <form class="d-flex" method="get">
                        <input type="text" name="guru" hidden>
                        <input type="text" name="jk" hidden value="<?php if (isset($_GET['search'])) {
                            echo $search;
                        } else {
                            echo '';
                        } ?>">
                        <select class="form-select me-2" name="jk">
                            <option value="" <?php if ($jkFilter == "") echo "selected"; ?>>All Gender</option>
                            <option value="Laki-laki" <?php if ($jkFilter == "L") echo "selected"; ?>>Male</option>
                            <option value="Perempuan" <?php if ($jkFilter == "P") echo "selected"; ?>>Female</option>
                        </select>
                        <button class="btn btn-danger" type="submit">Filter</button>
                    </form>
                <?php else: ?>
                    <form class="d-flex" method="get">
                        <input type="hidden" name="kelas" value="<?php echo $pilihanKelas; ?>">
                        <input type="text" name="jk" hidden value="<?php if (isset($_GET['search'])) {
                            echo $search;
                        } else {
                            echo '';
                        } ?>">
                        <select class="form-select me-2" name="jk">
                            <option value="" <?php if ($jkFilter == "") echo "selected"; ?>>All Gender</option>
                            <option value="Laki-laki" <?php if ($jkFilter == "L") echo "selected"; ?>>Male</option>
                            <option value="Perempuan" <?php if ($jkFilter == "P") echo "selected"; ?>>Female</option>
                        </select>
                        <button class="btn btn-danger" type="submit">Filter</button>
                    </form>
                <?php endif ?>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <?php
                if (isset($_GET['guru'])) {
                    include 'guru/table.php';
                } else {
                    include 'siswa/table.php';
                }
                ?>
                <?php include 'layout/pagination.php'; ?>
            </div>
    </div>

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
    