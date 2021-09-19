<?php 
  require_once "../../../config.php";

  $sql = "SELECT a.*, b.nama_lengkap, (SELECT nama_lengkap FROM tb_user WHERE id_user = a.id_user) as petugas FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user";
  $row = $config->prepare($sql);
  $row->execute();
  $has = $row->fetchAll(PDO::FETCH_OBJ);
?> 
<table id="example" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%;">
    <thead class="thead-light">
        <tr>
          <th>Judul</th>
          <th>Requestor</th>
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
      <tr class="tr" id="tr<?= $value->id_ticket; ?>" onclick="selectThisRecord('<?= $value->id_ticket ?>','<?= $value->judul_ticket ?>','<?= $value->status_ticket ?>')">
        <td><?= $value->judul_ticket; ?></td>
        <td><?= $value->nama_lengkap; ?></td>
        <td><?= $value->petugas; ?></td>
        <td><?= $level; ?></td>
        <td><?= $status; ?></td>
        <td><?= date('d-m-Y H:i',strtotime($value->tgl_buat)); ?></td>
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