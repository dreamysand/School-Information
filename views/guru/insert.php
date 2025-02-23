<div class="container form-container">
    <h2 class="text-center mb-4">Isi Guru</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Hidden Input -->
        <input type="number" name="hal" hidden value="<?php echo htmlspecialchars($hal); ?>">

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="nama" required placeholder="Isi dengan nama lengkap anda, contoh: Jennifer Bros">
        </div>

        <!-- Jenis Kelamin -->
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin:</label>
            <select class="form-select" name="jk" required>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <!-- Jabatan -->
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan:</label>
            <select class="form-select" name="jabatan" required>
                <option value="1">Kepala Sekolah</option>
                <option value="2">Wakil Kepala Sekolah</option>
                <option value="3">Kepala Jurusan</option>
                <option value="4">Guru Mata Pelajaran</option>
            </select>
        </div>

        <!-- Mapel -->
        <div class="mb-3">
            <label for="mapel" class="form-label">Mapel:</label>
            <input type="text" class="form-control" name="mapel" required placeholder="Isi dengan mapel anda">
        </div>

        <!-- Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <!-- Tambahkan onchange untuk memanggil fungsi JavaScript -->
            <input type="file" class="form-control" name="gambar" required onchange="previewImage(event)">
        </div>

        <!-- Preview Gambar -->
        <div class="mb-3 text-center">
            <label for="preview" class="form-label" id="previewname" style="display: none;">Gambar</label><br>
            <img id="preview" src="#" alt="Preview Gambar" style="display: none; width: 200px; height: auto; border: 1px solid #ddd; padding: 10px; margin: 0 auto;">
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" name="kirim" class="btn btn-custom">Kirim</button>
        </div>
    </form>
</div>

<!-- JavaScript untuk Preview Gambar -->
<script>
function previewImage(event) {
    const previewname = document.getElementById('previewname');
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Tampilkan gambar setelah diunggah
            previewname.style.display = 'block';
        }
        reader.readAsDataURL(file); // Konversi file ke URL
    } else {
        preview.src = '#'; // Reset gambar jika tidak ada file
        preview.style.display = 'none'; // Sembunyikan gambar jika tidak ada file
        previewname.style.display = 'none';
    }
}
</script>
