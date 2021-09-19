<?php 
	require_once "../../config.php";

	extract($_POST);
	if($proses == 'Edit'){
		$sql = "UPDATE `tb_ticket` SET `id_user`=?,`status_ticket`=?,`tgl_proses`=NOW() WHERE `id_ticket`=?";
		$row = $config->prepare($sql);
		$row->execute(array($id_user, '2', $id_ticket));
		$info = $row->errorInfo();
		if($info['2'] == ''){
			echo json_encode(array("Berhasil Menyunting Data...", "success", "sunting"));
		}else{
			echo json_encode(array("Gagal Menyunting Data...", "danger", "sunting"));
		}
	}else if($proses == 'Selesai'){
		$sql = "UPDATE `tb_ticket` SET `status_ticket`=?,`tgl_selesai`=NOW() WHERE `id_ticket`=?";
		$row = $config->prepare($sql);
		$row->execute(array('3', $idSelesai));
		$info = $row->errorInfo();
		if($info['2'] == ''){
			echo json_encode(array("Berhasil Menyunting Data...", "success", "sunting"));
		}else{
			echo json_encode(array("Gagal Menyunting Data...", "danger", "sunting"));
		}
	}
?>