<?php 
if (count($result) > 0) { 
	?> 
	<table border="1" class="table table-bordered table-custom">
		<th colspan="10" style="border: none;">
			TABEL GURU
        </th>
        <tr>
			<th>Id</th>
			<th>Nama</th>
			<th>JK</th>
			<th>Jabatan</th>
			<th>Mapel</th>
			<th>Drop</th>
			<th>Show</th>
			<th>Edit</th>
        </tr>
        <?php foreach ($result as $row) { ?>
		<tr style="height: 2rem;">
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['namaguru']; ?></td>
			<td><?php echo $row['jk']; ?></td>
			<td><?php echo $row['jabatan']; ?></td>
			<td><?php echo $row['mapel']; ?></td>
			<td><a href="&action=delete&delete=<?php echo $row['id']; ?>&start_show_hal=<?php echo $start_show_hal; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')"><i class="fa-solid fa-trash"></i>A</a></td>
			<td><a href="show.php?guru&action=show&show=<?php echo $row['id']; ?>"><i class="fa-solid fa-eye"></i>A</a></td>
			<td><a href="edit.php?guru&action=edit&edit=<?php echo $row['id']; ?>&start_show_hal=<?php echo $start_show_hal; ?>"><i class="fa-solid fa-pen-to-square"></i>A</a></td>
        </tr>
    <?php } ?>
    </table>
    <?php } else { ?>
        <table border="1" class="table table-bordered table-custom">
            <th colspan="10" style="border: none;">
                TABEL GURU
            </th>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Jabatan</th>
                <th>Mapel</th>
                <th>Drop</th>
                <th>Show</th>
                <th>Edit</th>
            </tr>
            <tr style="height: 2rem;">
                <td colspan="10">TIDAK ADA DATA</td>
            </tr>
        </table>
    <?php }

?>