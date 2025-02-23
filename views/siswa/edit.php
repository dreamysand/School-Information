<?php?>
<!-- Form Container -->
    <div class="container form-container">
        <h2 class="text-center mb-4">Isi Data Nilai MKK</h2>
        <form action="?action=update&update=<?php echo $row['nis'] ?>" method="post">
            <!-- Hidden Input -->
            <input type="number" name="hal" hidden value="<?php echo htmlspecialchars($_GET['start_show_hal']); ?>">

            <!-- NIS -->
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="number" class="form-control" name="nis" required placeholder="Isi dengan angka, contoh: 1, 2, 3, dll" value="<?php echo htmlspecialchars($row['nis']); ?>">
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" required placeholder="Isi dengan nama lengkap anda, contoh: Jennifer Bros" value="<?php echo htmlspecialchars($row['nama']); ?>">
            </div>

            <!-- Kelas -->
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <select class="form-select" name="kelas" required>
                    <option <?php if ($row['kelas'] == '11 RPL 1') echo "selected"; ?>>11 RPL 1</option>
                    <option <?php if ($row['kelas'] == '11 RPL 2') echo "selected"; ?>>11 RPL 2</option>
                </select>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin:</label>
                <select class="form-select" name="jk" required>
                    <option value="Laki-laki" <?php if ($row['jk'] == 'Laki-laki') { echo 'selected'; } ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($row['jk'] == 'Perempuan') { echo 'selected'; } ?>>Perempuan</option>
                </select>
            </div>

            <!-- Nilai -->
            <div class="mb-3">
                <label for="nilaipweb" class="form-label">Nilai PWEB:</label>
                <input type="number" class="form-control" name="nilaipweb" required max="100" min="0" placeholder="Isi dengan angka, contoh: 1, 2, 3, dll" value="<?php echo htmlspecialchars($row['nilaipweb']); ?>">
            </div>

            <div class="mb-3">
                <label for="nilaipbo" class="form-label">Nilai PBO:</label>
                <input type="number" class="form-control" name="nilaipbo" required max="100" min="0" placeholder="Isi dengan angka, contoh: 1, 2, 3, dll" value="<?php echo htmlspecialchars($row['nilaipbo']); ?>">
            </div>

            <div class="mb-3">
                <label for="nilaidb" class="form-label">Nilai BASDAT:</label>
                <input type="number" class="form-control" name="nilaidb" required max="100" min="0" placeholder="Isi dengan angka, contoh: 1, 2, 3, dll" value="<?php echo htmlspecialchars($row['nilaidb']); ?>">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" name="kirim" class="btn btn-custom">Perbarui</button>
            </div>
        </form>
    </div>
<?php?>