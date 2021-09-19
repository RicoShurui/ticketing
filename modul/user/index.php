<?php
  if($_SESSION['login']['level'] == 1){
    $sql = "SELECT * FROM tb_user";
    $row = $config->prepare($sql);
    $row->execute();
    $has = $row->fetchAll(PDO::FETCH_OBJ);
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <button class="btn btn-primary" title="Tambah" data-toggle="modal" data-target="#modalTambah"><i class="nav-icon fas fa-plus"></i></button>
              <button type="button" class="btn btn-warning text-white" title="Sunting" title="Sunting" onclick="openModal('Edit', '<?= $page ?>')"><i class="nav-icon fas fa-pencil-alt"></i></button>
              <button type="button" class="btn btn-danger" title="Hapus" onclick="openModal('Hapus')"><i class="nav-icon fas fa-trash"></i></button>
            </div>
            <div class="card-body">
              <input type="hidden" id="input">
              <input type="hidden" id="ket">
              <div id="tbody">
                <table id="example" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%;">
                    <thead class="thead-light">
                        <tr>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>Departemen</th>
                          <th>Email</th>
                          <th>Level</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($has as $value){ 
                      ?>
                      <tr class="tr" id="tr<?= $value->id_user; ?>" onclick="selectRecord('<?= $value->id_user ?>','<?= $value->username ?>')">
                        <td><?= $value->username; ?></td>
                        <td><?= $value->nama_lengkap; ?></td>
                        <td><?= $value->departemen; ?></td>
                        <td><?= $value->email; ?></td>
                        <?php 
                          if($value->level == 1){ 
                            $level = 'Administrator';
                          }else if($value->level == 2){
                            $level = 'Manager';
                          }else if($value->level == 3){
                            $level = 'User';
                          }
                        ?>
                        <td><?= $level; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include_once 'modul/user/inc/modal.php'; ?>
<?php } else { ?>
    <script type="text/javascript">
      history.go(-1);
    </script>
<?php } ?>