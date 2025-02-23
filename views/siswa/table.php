<?php 
if (count($result) > 0) { 
        ?> 
        <table border="1" class="table table-bordered table-custom">
            <th colspan="10" style="border: none;">
                <?php if (isset($_GET['kelas'])) { ?>
                    TABEL NILAI <?php echo $pilihanKelas; ?>
                <?php } else { ?>
                    TABEL NILAI 11 RPL 1
                <?php } ?>
            </th>
            <tr>
                <th>No.Absen</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>JK</th>
                <th>Nilai PWEB</th>
                <th>Nilai PBO</th>
                <th>Nilai BASDAT</th>
                <th>Drop</th>
                <th>Edit</th>
            </tr>
            <?php foreach ($result as $row) { ?>
                <tr style="height: 2rem;">
                    <td><?php echo $row['presensi']; ?></td>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['jeniskelamin']; ?></td>
                    <td <?php if ($row['nilaipweb'] <= 78) { ?>style="color: #F50C0C;"<?php } ?>><?php echo $row['nilaipweb']; ?></td>
                    <td <?php if ($row['nilaipbo'] <= 78) { ?>style="color: #F50C0C;"<?php } ?>><?php echo $row['nilaipbo']; ?></td>
                    <td <?php if ($row['nilaidb'] <= 78) { ?>style="color: #F50C0C;"<?php } ?>><?php echo $row['nilaidb']; ?></td>
                    <td><a href="?action=delete&delete=<?php echo $row['nis']; ?>&start_show_hal=<?php echo $start_show_hal; ?>&kelas=<?php echo $row['kelas']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')"><i class="fa-solid fa-trash"></i>A</a></td>
                    <td><a href="edit.php?action=edit&edit=<?php echo $row['nis']; ?>&start_show_hal=<?php echo $start_show_hal; ?>&kelas=<?php echo $row['kelas']; ?>"><i class="fa-solid fa-pen-to-square"></i>A</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <table border="1" class="table table-bordered table-custom">
            <th colspan="10" style="border: none;">
                <?php if (isset($_GET['kelas'])) { ?>
                    TABEL NILAI <?php echo $pilihanKelas; ?>
                <?php } else { ?>
                    TABEL NILAI 11 RPL 1
                <?php } ?>
            </th>
            <tr>
                <th>No.Absen</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>JK</th>
                <th>Nilai PWEB</th>
                <th>Nilai PBO</th>
                <th>Nilai BASDAT</th>
                <th colspan="2">Opsi</th>
            </tr>
            <tr style="height: 2rem;">
                <td colspan="10">TIDAK ADA DATA</td>
            </tr>
        </table>
    <?php }

?>