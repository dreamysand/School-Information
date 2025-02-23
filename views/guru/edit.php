<?php ?>
<!-- Form Container -->
<div class="container form-container">
    <h2 class="text-center mb-4">Isi Data Guru</h2>
    <form action="?guru&action=update&update=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
        <!-- Hidden Input -->
        <input type="number" name="hal" hidden value="<?php echo htmlspecialchars($_GET['start_show_hal']); ?>">

        <!-- Id -->
        <input type="number" name="id" hidden value="<?php echo htmlspecialchars($row['id']); ?>">

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="nama" required placeholder="Isi dengan nama lengkap anda" value="<?php echo htmlspecialchars($row['nama']); ?>">
        </div>

        <!-- Jenis Kelamin -->
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin:</label>
            <select class="form-select" name="jk" required>
                <option value="Laki-laki" <?php if ($row['jk'] == 'Laki-laki') { echo 'selected'; } ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($row['jk'] == 'Perempuan') { echo 'selected'; } ?>>Perempuan</option>
            </select>
        </div>

        <!-- Jabatan -->
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan:</label>
            <select class="form-select" name="jabatan" required>
                <option value="1" <?php if ($row['jabatan'] == '1') { echo 'selected'; } ?>>Kepala Sekolah</option>
                <option value="2" <?php if ($row['jabatan'] == '2') { echo 'selected'; } ?>>Wakil Kepala Sekolah</option>
                <option value="3" <?php if ($row['jabatan'] == '3') { echo 'selected'; } ?>>Kepala Jurusan</option>
                <option value="4" <?php if ($row['jabatan'] == '4') { echo 'selected'; } ?>>Guru Mata Pelajaran</option>
            </select>
        </div>

        <!-- Mapel -->
        <div class="mb-3">
            <label for="mapel" class="form-label">Mapel:</label>
            <input type="text" class="form-control" name="mapel" required placeholder="Isi dengan mapel anda" value="<?php echo htmlspecialchars($row['mapel']); ?>">
        </div>

        <!-- Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Baru:</label>
            <input type="file" class="form-control" name="gambar" onchange="previewImage(event)">
        </div>

        <!-- Preview Gambar -->
        <div class="mb-3 text-center">
            <label for="preview" class="form-label">Gambar</label><br>
            <img id="preview" src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="Preview Gambar Lama" style="width: 200px; height: auto; border: 1px solid #ddd; padding: 10px; margin: 0 auto;">
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" name="kirim" class="btn btn-custom">Perbarui</button>
        </div>
    </form>
</div>

<!-- JavaScript untuk Preview Gambar Baru -->
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>
<?php ?>
