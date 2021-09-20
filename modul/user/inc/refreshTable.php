<?php 
  require_once "../../../config.php";

  $sql = "SELECT * FROM tb_user";
  $row = $config->prepare($sql);
  $row->execute();
  $has = $row->fetchAll(PDO::FETCH_OBJ);
?> 
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            responsive:true
        });
    });
</script>