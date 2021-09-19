<?php 
	session_start();
	require_once "../../config.php";

	extract($_POST);
	if($proses == 'Simpan'){
		$sql = "INSERT INTO `tb_ticket`(`id_requestor`, `judul_ticket`, `keterangan_ticket`, `level_ticket`, `tgl_buat`) VALUES (?,?,?,?,NOW())";
		$row = $config->prepare($sql);
		$row->execute(array($_SESSION['login']['id_user'], $judul, $keterangan, $level));
		$info = $row->errorInfo();
		if($info['2'] == ''){
			echo json_encode(array("Berhasil Menambahkan Data...", "success", "tambah"));
		}else{
			echo json_encode(array("Gagal Menambahkan Data...", "danger", "tambah"));
		}
	}else if($proses == 'Edit'){
		$sql = "UPDATE tb_ticket SET judul_ticket = ?, keterangan_ticket = ?, level_ticket = ?, tgl_buat = NOW() WHERE id_ticket = ?";
		$row = $config->prepare($sql);
		$row->execute(array($judul_ticket, $keterangan, $level, $id_ticket));
		$info = $row->errorInfo();
		if($info['2'] == ''){
			echo json_encode(array("Berhasil Menyunting Data...", "success", "sunting"));
		}else{
			echo json_encode(array("Gagal Menyunting Data...", "danger", "sunting"));
		}
	}else if($proses == 'Hapus'){
		$sql = 'DELETE FROM `tb_user` WHERE `id_user` = ?';
		$row = $config->prepare($sql);
		$row->execute(array($idHapus));
		$info = $row->errorInfo();
		if($info['2'] == ''){
			echo json_encode(array("Berhasil Menghapus Data...", "success", "sunting"));
		}else{
			echo json_encode(array("Gagal Menghapus Data...", "danger", "sunting"));
		}
	}
?>