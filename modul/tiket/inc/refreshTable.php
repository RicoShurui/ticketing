<?php 
  session_start();
  require_once "../../../config.php";

  if($_SESSION['login']['level'] == 2){
    $sql = "SELECT a.*, b.nama_lengkap, (SELECT nama_lengkap FROM tb_user WHERE id_user = a.id_user) as petugas FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE b.departemen = '".$_SESSION['login']['departemen']."'";
  }else{
    $sql = "SELECT a.*, b.nama_lengkap, (SELECT nama_lengkap FROM tb_user WHERE id_user = a.id_user) as petugas FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.id_requestor = ".$_SESSION['login']['id_user'];
  }
  $row = $config->prepare($sql);
  $row->execute();
  $has = $row->fetchAll(PDO::FETCH_OBJ);
?> 
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            responsive:true
        });
    });
</script>