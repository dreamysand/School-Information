<?php
if (isset($_GET['action'])) {
	if (isset($_GET['guru'])) {
		include 'function/guru.php';
		$action = $_GET['action'];

		switch ($action) {
			case 'edit':
				$guru = $_GET['guru'];
				$id = $_GET['edit'];
				$row = edit($guru, $id);
				break;
			case 'update':
				$guru = $_GET['guru'];
				$request = $_SERVER['REQUEST_METHOD'];
				$id = $_GET['update'];
				update($guru, $request, $id);
				break;
			case 'insert':
				$guru = $_GET['guru'];
			    $request = $_SERVER['REQUEST_METHOD'];
				insert($guru, $request);
				break;
			case 'delete':
				$guru = $_GET['guru'];
				$id = $_GET['delete'];
				delete($guru, $id);
				break;
			case 'show':
				$guru = $_GET['guru'];
				$id = $_GET['show'];
				$row = show($guru, $id);
				break;
			default:
				$guru = $_GET['guru'];
				$row = read($guru);
				$result = $row['result'];
				$row_total_data = $row['row_total_data'];
				$total_halaman = $row['total_halaman'];
				$start_show_hal = $row['start_show_hal'];
				$next = $row['next'];
				$prev = $row['prev'];
				$search = $row['search'];
				$jkFilter = $row['jkFilter'];
				break;
		}
	} else {
		include 'function/siswa.php';
		$action = $_GET['action'];

		switch ($action) {
			case 'edit':
				$nis = $_GET['edit'];
				$row = edit($nis);
				break;
			case 'update':
				$request = $_SERVER['REQUEST_METHOD'];
				$nis = $_GET['update'];
				update($request, $nis);
				break;
			case 'insert':
			    $request = $_SERVER['REQUEST_METHOD'];
				insert($request);
				break;
			case 'delete':
				$nis = $_GET['delete'];
				delete($nis);
				break;
			default:
				$row = read();
				$result = $row['result'];
				$row_total_data = $row['row_total_data'];
				$total_halaman = $row['total_halaman'];
				$start_show_hal = $row['start_show_hal'];
				$pilihanKelas = $row['pilihanKelas'];
				$next = $row['next'];
				$prev = $row['prev'];
				$search = $row['search'];
				$jkFilter = $row['jkFilter'];
				break;
		}
	}
} else {
	if (isset($_GET['guru'])) {
		include 'function/guru.php';
		$guru = $_GET['guru'];
		$row = read($guru);
		$result = $row['result'];
		$row_total_data = $row['row_total_data'];
		$total_halaman = $row['total_halaman'];
		$start_show_hal = $row['start_show_hal'];
		$next = $row['next'];
		$prev = $row['prev'];
		$search = $row['search'];
		$jkFilter = $row['jkFilter'];
	} else {
		include 'function/siswa.php';
		$row = read();
		$result = $row['result'];
		$row_total_data = $row['row_total_data'];
		$total_halaman = $row['total_halaman'];
		$start_show_hal = $row['start_show_hal'];
		$pilihanKelas = $row['pilihanKelas'];
		$next = $row['next'];
		$prev = $row['prev'];
		$search = $row['search'];
		$jkFilter = $row['jkFilter'];
	}
	
}
?>
