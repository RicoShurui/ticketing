<?php 
	require_once "../../config.php";

	extract($_POST);
	if($proses == 'Simpan'){
		$sql = "INSERT INTO `tb_user`(`username`, `password`, `nama_lengkap`, `departemen`, `email`, `level`, `tgl_buat`) VALUES (?,MD5(?),?,?,?,?,NOW())";
		$row = $config->prepare($sql);
		$row->execute(array($username, $password, $nama_lengkap, $departemen, $email, $level));
		$info = $row->errorInfo();
		if($info['2'] == ''){
			echo json_encode(array("Berhasil Menambahkan Data...", "success", "tambah"));
		}else{
			echo json_encode(array("Gagal Menambahkan Data...", "danger", "tambah"));
		}
	}else if($proses == 'Edit'){
		if($password != $old_password){
			$pass = $password;
			$sql = "UPDATE `tb_user` SET `username`=?,`password`=MD5(?),`nama_lengkap`=?,`departemen`=?,`email`=?,`level`=?,`tgl_buat`=NOW() WHERE `id_user`=?";
		}else{
			$pass = $old_password;
			$sql = "UPDATE `tb_user` SET `username`=?,`password`=?,`nama_lengkap`=?,`departemen`=?,`email`=?,`level`=?,`tgl_buat`=NOW() WHERE `id_user`=?";
		}

		$row = $config->prepare($sql);
		$row->execute(array($username, $pass, $nama_lengkap, $departemen, $email, $level, $user_id));
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