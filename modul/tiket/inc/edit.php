<?php 
  session_start();
    require_once '../../../config.php';

    extract($_GET);
    $sql = "SELECT a.*, b.nama_lengkap, (SELECT nama_lengkap FROM tb_user WHERE id_user = a.id_user) as petugas FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.id_requestor = ".$_SESSION['login']['id_user']." AND id_ticket = ".$id;
    $row = $config->prepare($sql);
    $row->execute();
    $hasil = $row->fetch(PDO::FETCH_OBJ);
?>
<div class="modal-body">
  <input type="hidden" name="id_ticket" value="<?= $id ?>">
  <div class="form-group row">
      <label for="username" class="col-sm-3 control-label col-form-label">Judul</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="judul_ticket" name="judul_ticket" value="<?= $hasil->judul_ticket ?>" placeholder="Judul" required>
      </div>
  </div>
  <div class="form-group row">
      <label for="password" class="col-sm-3 control-label col-form-label">Keterangan</label>
      <div class="col-sm-9">
        <textarea class="form-control" name="keterangan"> <?= $hasil->keterangan_ticket ?></textarea>
      </div>
  </div>
  <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Level</label>
      <div class="col-sm-9">
        <select class="form-control" id="level" name="level" required>
          <option value="">----- Pilih Level -----</option>
          <option value="1" <?= ($hasil->level_ticket == '1') ? 'selected' : ''; ?>>Low</option>
          <option value="2" <?= ($hasil->level_ticket == '2') ? 'selected' : ''; ?>>Medium</option>
          <option value="3" <?= ($hasil->level_ticket == '3') ? 'selected' : ''; ?>>High</option>
        </select>
      </div>
  </div>
</div>
<div class="modal-footer">
	<input class="btn btn-info" type="submit" value="Sunting" onclick="submitData('formEdit','tiket', event)">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
</div>