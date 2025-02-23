<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            position: relative;
            min-height: 100vh;
            padding-bottom: 100px;
            background-color: #e9ecef;
        }
        nav.bg-custom {
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
        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-body img {
            display: block;
            width: auto;
            height: 100%;
            object-fit: cover;
            overflow: hidden;
            margin-top: 15px;
        }
        .btn-back {
            background-color: #E90919;
            color: white;
            margin-bottom: 10px;
        }
        .btn-back:hover {
            background-color: #B90411;
        }
        .btn-save {
            background-color: #28a745;
            color: white;
        }
        .btn-save:hover {
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
        <button class="btn btn-back" type="button" onclick="window.location.href='profile.php'">
            Back
        </button>
    </nav>

    <!-- Profile Edit Container -->
    <div class="container profile-container">
        <div class="profile-header">
            <h3>Edit Profil Pengguna</h3>
        </div>
        <div class="profile-body">
            <!-- Preview Foto Profil -->
            <div class="img-container">
                <img id="profile-img" src="<?php echo htmlspecialchars($row['img']); ?>" alt="Profile Image">
            </div>
            <!-- Form Edit Profile -->
            <form action="editprofile.php?action=update" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" required hidden>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Ganti Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Isi password baru anda" value="<?php echo htmlspecialchars($_SESSION['password']); ?>">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Ganti Foto Profil</label>
                    <input type="hidden" name="gambar_lama" value="<?php echo htmlspecialchars($row['img']); ?>">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <!-- Crop Button -->
                <div class="text-center mb-3">
                    <button type="button" class="btn btn-warning" id="crop-btn" style="display:none;">Crop Gambar</button>
                </div>
                <button type="submit" class="btn btn-save w-100">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-custom">
        &copy; 2024 Dean. Ya Udah Lah.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

    <script>
        let profilePicInput = document.getElementById('gambar');
        let profileImg = document.getElementById('profile-img');
        let cropBtn = document.getElementById('crop-btn');
        let cropper;

        profilePicInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileImg.src = e.target.result;
                    cropBtn.style.display = 'block';

                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(profileImg, {
                        aspectRatio: 1,
                        viewMode: 1,
                        autoCropArea: 1,
                        movable: true,
                        zoomable: true,
                        scalable: true,
                        cropBoxMovable: true,
                        cropBoxResizable: true
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        cropBtn.addEventListener('click', function () {
            const canvas = cropper.getCroppedCanvas({
                width: 150,
                height: 150
            });

            const croppedImageData = canvas.toDataURL();
            const croppedImageInput = document.createElement('input');
            croppedImageInput.type = 'hidden';
            croppedImageInput.name = 'cropped_image';
            croppedImageInput.value = croppedImageData;

            const form = document.querySelector('form');
            form.appendChild(croppedImageInput);

            profileImg.src = croppedImageData;
            cropBtn.style.display = 'none';
        });
    </script>
</body>
</html>
