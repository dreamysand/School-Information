<?php
?>
<div class="container form-container">
        <h2 class="text-center mb-4">Isi Data Nilai MKK</h2>
        <form action="" method="post">
            <!-- Hidden Input -->
            <input type="number" name="hal" hidden value="<?php echo htmlspecialchars($_GET['start_show_hal']); ?>">

            <!-- NIS -->
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="number" class="form-control" name="nis" required placeholder="Isi dengan angka, contoh: 1, 2, 3, dll">
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" required placeholder="Isi dengan nama lengkap anda, contoh: Jennifer Bros">
            </div>

            <!-- Kelas -->
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <select class="form-select" name="kelas" required>
                    <option <?php if ($_GET['kelas'] == '11 RPL 1') echo "selected"; ?>>11 RPL 1</option>
                    <option <?php if ($_GET['kelas'] == '11 RPL 2') echo "selected"; ?>>11 RPL 2</option>
                </select>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin:</label>
                <select class="form-select" name="jk" required>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <!-- Nilai -->
            <div class="mb-3">
                <label for="nilaipweb" class="form-label">Nilai PWEB:</label>
                <input type="number" class="form-control" name="nilaipweb" required max="100" min="0" placeholder="Isi dengan angka, contoh: 1, 2, 3, dll">
            </div>

            <div class="mb-3">
                <label for="nilaipbo" class="form-label">Nilai PBO:</label>
                <input type="number" class="form-control" name="nilaipbo" required max="100" min="0" placeholder="Isi dengan angka, contoh: 1, 2, 3, dll">
            </div>

            <div class="mb-3">
                <label for="nilaidb" class="form-label">Nilai BASDAT:</label>
                <input type="number" class="form-control" name="nilaidb" required max="100" min="0" placeholder="Isi dengan angka, contoh: 1, 2, 3, dll">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" name="kirim" class="btn btn-custom">Kirim</button>
            </div>
        </form>
    </div>
<?php
?>