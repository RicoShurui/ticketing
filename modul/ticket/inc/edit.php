<?php 
    require_once '../../../config.php';

    extract($_GET);
    $sql = "SELECT a.*, b.nama_lengkap FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.id_ticket = ".$id;
    $row = $config->prepare($sql);
    $row->execute();
    $hasil = $row->fetch(PDO::FETCH_OBJ);

    if($lihat == 1){
      $disabled = 'readonly';
    }
?>
<div class="modal-body">
  <input type="hidden" name="id_ticket" value="<?= $id ?>">
  <div class="form-group row">
      <label for="username" class="col-sm-3 control-label col-form-label">Judul</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="judul_ticket" name="judul_ticket" value="<?= $hasil->judul_ticket ?>" placeholder="Judul" <?= $disabled ?> required>
      </div>
  </div>
  <div class="form-group row">
      <label for="password" class="col-sm-3 control-label col-form-label">Keterangan</label>
      <div class="col-sm-9">
        <textarea class="form-control" name="keterangan" <?= $disabled ?>> <?= $hasil->keterangan_ticket ?></textarea>
      </div>
  </div>
  <div class="form-group row">
      <label for="username" class="col-sm-3 control-label col-form-label">Requestor</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="requestor" name="requestor" value="<?= $hasil->nama_lengkap ?>" placeholder="Requestor" <?= $disabled ?> required>
      </div>
  </div>
  <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Level</label>
      <div class="col-sm-9">
        <select class="form-control" id="level" name="level" disabled required>
          <option value="">----- Pilih Level -----</option>
          <option value="1" <?= ($hasil->level_ticket == '1') ? 'selected' : ''; ?>>Low</option>
          <option value="2" <?= ($hasil->level_ticket == '2') ? 'selected' : ''; ?>>Medium</option>
          <option value="3" <?= ($hasil->level_ticket == '3') ? 'selected' : ''; ?>>High</option>
        </select>
      </div>
  </div>
  <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Status</label>
      <div class="col-sm-9">
        <select class="form-control" id="status" name="status" disabled required>
          <option value="">----- Pilih Status -----</option>
          <option value="1" <?= ($hasil->status_ticket == '1') ? 'selected' : ''; ?>>Requested</option>
          <option value="2" <?= ($hasil->status_ticket == '2') ? 'selected' : ''; ?>>On Progress</option>
          <option value="3" <?= ($hasil->status_ticket == '3') ? 'selected' : ''; ?>>Completed</option>
          <option value="4" <?= ($hasil->status_ticket == '4') ? 'selected' : ''; ?>>Cancelled</option>
        </select>
      </div>
  </div>
  <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Petugas</label>
      <div class="col-sm-9">
        <select class="form-control" id="id_user" name="id_user" required>
          <option value="">----- Pilih Petugas -----</option>
          <?php 
            $s = "SELECT * FROM tb_user WHERE level = 1";
            $q = $config->prepare($s);
            $q->execute();
            $h = $q->fetchAll(PDO::FETCH_OBJ);
            foreach($h as $v){
          ?>
            <option value=<?= $v->id_user ?>><?= $v->nama_lengkap ?></option>
          <?php } ?>
        </select>
      </div>
  </div>
</div>
<div class="modal-footer">
  <input class="btn btn-info" type="submit" value="Sunting" onclick="submitData('formEdit','ticket', event)">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
</div>