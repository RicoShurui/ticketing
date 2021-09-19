<?php
  if($_SESSION['login']['level'] == 3){
    $sql = "SELECT a.*, b.nama_lengkap, (SELECT nama_lengkap FROM tb_user WHERE id_user = a.id_user) as petugas FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.id_requestor = ".$_SESSION['login']['id_user'];
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
            <h1 class="m-0">Ticket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
              <li class="breadcrumb-item active">Ticket</li>
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
              <button type="button" class="btn btn-warning text-white" id="sunting" title="Sunting" title="Sunting" onclick="openModal('Edit', '<?= $page ?>')"><i class="nav-icon fas fa-pencil-alt"></i></button>
              <button type="button" class="btn btn-danger" id="hapus" title="Hapus" onclick="openModal('Hapus')"><i class="nav-icon fas fa-trash"></i></button>
            </div>
            <div class="card-body">
              <input type="hidden" id="input">
              <input type="hidden" id="ket">
              <div id="tbody">
                <table id="example" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%;">
                    <thead class="thead-light">
                        <tr>
                          <th>Judul</th>
                          <th>Petugas</th>
                          <th>Level</th>
                          <th>Status</th>
                          <th>Tgl. Ticket</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($has as $value){ 
                          if($value->level_ticket == 1){ 
                            $level = 'Low';
                          }else if($value->level_ticket == 2){
                            $level = 'Medium';
                          }else if($value->level_ticket == 3){
                            $level = 'High';
                          }

                        if($value->status_ticket == 1){ 
                          $status = 'Requested';
                        }else if($value->status_ticket == 2){
                          $status = 'On Progress';
                        }else if($value->status_ticket == 3){
                          $status = 'Completed';
                        }else if($value->status_ticket == 3){
                          $status = 'Cancelled';
                        }
                      ?>
                      <tr class="tr" id="tr<?= $value->id_ticket; ?>" onclick="selectThisRecord ('<?= $value->id_ticket ?>','<?= $value->judul_ticket ?>','<?= $value->status_ticket ?>')">
                        <td><?= $value->judul_ticket; ?></td>
                        <td><?= $value->petugas; ?></td>
                        <td><?= $level; ?></td>
                        <td><?= $status; ?></td>
                        <td>
                          Request <?= date('d-m-Y H:i',strtotime($value->tgl_buat)); ?> <br/>
                          <?= ($value->tgl_proses=='0000-00-00 00:00:00') ? '': 'Proses '.$value->tgl_proses; ?> <br/>
                          <?= ($value->tgl_selesai=='0000-00-00 00:00:00') ? '': 'Selesai '.$value->tgl_selesai; ?>
                        </td>
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
  <?php include_once 'modul/tiket/inc/modal.php'; ?>
  <script type="text/javascript">
    function selectThisRecord(idInput, ket, status){
      $("#input").val(idInput);
      $("#ket").val(ket);
      $(".tr").css("background","#343a40");
      $("#tr"+idInput).css("background","grey");

      if(status == 1){
        $("#sunting").show(); 
        $("#hapus").show();
        $("#selesai").hide(); 
      }else if(status == 2){
        $("#sunting").hide(); 
        $("#hapus").hide();
        $("#selesai").show(); 
      }else if(status == 3 || status == 4){
        $("#sunting").hide(); 
        $("#hapus").hide();
        $("#selesai").hide();
      }
    }
  </script>
<?php } else { ?>
    <script type="text/javascript">
      history.go(-1);
    </script>
<?php } ?>