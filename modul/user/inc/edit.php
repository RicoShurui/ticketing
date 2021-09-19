<?php 
    require_once '../../../config.php';

    extract($_GET);
    $sql = "SELECT * FROM tb_user WHERE id_user = ".$id;
    $row = $config->prepare($sql);
    $row->execute();
    $hasil = $row->fetch(PDO::FETCH_OBJ);
?>
<div class="modal-body">
  <input type="hidden" name="user_id" value="<?= $id ?>">
  <input type="hidden" name="old_password" value="<?= $hasil->password ?>">
  <div class="form-group row">
      <label for="username" class="col-sm-3 control-label col-form-label">Username</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="username" name="username" value="<?= $hasil->username ?>" placeholder="Username" required>
      </div>
  </div>
  <div class="form-group row">
      <label for="password" class="col-sm-3 control-label col-form-label">Password</label>
      <div class="col-sm-9">
          <input type="password" class="form-control" id="password" name="password" value="<?= $hasil->password ?>" placeholder="Password" required>
      </div>
  </div>
  <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Nama Lengkap</label>
      <div class="col-sm-9">
          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $hasil->nama_lengkap ?>" placeholder="Nama Lengkap" required>
      </div>
  </div>
  <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Departemen</label>
      <div class="col-sm-9">
        <select class="form-control" id="departemen" name="departemen" required>
          <option value="">----- Pilih Departemen -----</option>
          <option value="Information Technology" <?= ($hasil->departemen == 'Information Technology') ? 'selected' : ''; ?>>Information Technology</option>
          <option value="Marketing" <?= ($hasil->departemen == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
          <option value="Finance" <?= ($hasil->departemen == 'Finance') ? 'selected' : ''; ?>>Finance</option>
          <option value="Human Resource Departmen" <?= ($hasil->departemen == 'Human Resource Departmen') ? 'selected' : ''; ?>>Human Resource Departmen</option>
          <option value="General Affair" <?= ($hasil->departemen == 'General Affair') ? 'selected' : ''; ?>>General Affair</option>
        </select>
      </div>
  </div>
  <div class="form-group row">
      <label for="email" class="col-sm-3 control-label col-form-label">Email</label>
      <div class="col-sm-9">
          <input type="email" class="form-control" id="email" name="email" value="<?= $hasil->email ?>" placeholder="Email"  required>
      </div>
  </div>
  <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-3 control-label col-form-label">Level</label>
      <div class="col-sm-9">
        <select class="form-control" id="level" name="level" required>
          <option value="">----- Pilih Level -----</option>
          <option value="1" <?= ($hasil->level == '1') ? 'selected' : ''; ?>>Administrator</option>
          <option value="2" <?= ($hasil->level == '2') ? 'selected' : ''; ?>>Manager</option>
          <option value="3" <?= ($hasil->level == '3') ? 'selected' : ''; ?>>User</option>
        </select>
      </div>
  </div>
</div>
<div class="modal-footer">
	<input class="btn btn-info" type="submit" value="Sunting" onclick="submitData('formEdit','user', event)">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
</div>