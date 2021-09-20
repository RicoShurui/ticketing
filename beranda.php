  <?php 
  $thn = (empty($_GET['thn'])) ? date('Y'): $_GET['thn'];
  $sql = "SELECT *, count(*) as jumlah FROM `tb_ticket` WHERE YEAR(tgl_buat) = ? GROUP BY status_ticket, MONTH(tgl_buat)";
  $row = $config->prepare($sql);
  $row->execute(array($thn));
  $has = $row->fetchAll(PDO::FETCH_OBJ);

  $requested      = array("Januari"=>"0","Februari"=>"0","Maret"=>"0","April"=>"0","Mei"=>"0","Juni"=>"0","Juli"=>"0","Agustus"=>"0","September"=>"0","Oktober"=>"0","November"=>"0","Desember"=>"0");
  $progress     = array("Januari"=>"0","Februari"=>"0","Maret"=>"0","April"=>"0","Mei"=>"0","Juni"=>"0","Juli"=>"0","Agustus"=>"0","September"=>"0","Oktober"=>"0","November"=>"0","Desember"=>"0");
  $completed  = array("Januari"=>"0","Februari"=>"0","Maret"=>"0","April"=>"0","Mei"=>"0","Juni"=>"0","Juli"=>"0","Agustus"=>"0","September"=>"0","Oktober"=>"0","November"=>"0","Desember"=>"0");
  $cancelled  = array("Januari"=>"0","Februari"=>"0","Maret"=>"0","April"=>"0","Mei"=>"0","Juni"=>"0","Juli"=>"0","Agustus"=>"0","September"=>"0","Oktober"=>"0","November"=>"0","Desember"=>"0");

  foreach($has as $value){
    if($value->status_ticket == '1'){
      $bulan = checkMonth($value->tgl_buat, $value->jumlah);
      $keys = array_keys($bulan)[0];
      $requested[$keys] = array_values($bulan)[0];
    }else if($value->status_ticket == '2'){
      $bulan = checkMonth($value->tgl_buat, $value->jumlah);
      $keys = array_keys($bulan)[0];
      $progress[$keys] = array_values($bulan)[0];
    }else if($value->status_ticket == '3'){
      $bulan = checkMonth($value->tgl_buat, $value->jumlah);
      $keys = array_keys($bulan)[0];
      $completed[$keys] = array_values($bulan)[0];
    }else if($value->status_ticket == '4'){
      $bulan = checkMonth($value->tgl_buat, $value->jumlah);
      $keys = array_keys($bulan)[0];
      $cancelled[$keys] = array_values($bulan)[0];
    }
  }

  function checkMonth($tgl, $value){
    $bulan = date("m", strtotime($tgl));
    switch($bulan){
      case '01':
        $months['Januari'] += $value;
        break;
      case '02':
        $months['Februari'] += $value;
        break;
      case '03':
        $months['Maret'] += $value;
        break;
      case '04':
        $months['April'] += $value;
        break;
      case '05':
        $months['Mei'] += $value;
        break;
      case '06':
        $months['Juni'] += $value;
        break;
      case '07':
        $months['Juli'] += $value;
        break;
      case '08':
        $months['Agustus'] += $value;
        break;
      case '09':
        $months['September'] += $value;
        break;
      case '10':
        $months['Oktober'] += $value;
        break;
      case '11':
        $months['November'] += $value;
        break;
      case '12':
        $months['Desember'] += $value;
        break;
    }
    return $months;
  }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Beranda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Beranda</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Requested</span>
                <?php 
                  if($_SESSION['login']['level'] == 1){
                    $sqlReq = 'SELECT * FROM tb_ticket WHERE status_ticket = 1';
                  }else if($_SESSION['login']['level'] == 2){
                    $sqlReq = 'SELECT a.* FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.status_ticket = 1 AND b.departemen = "'.$_SESSION['login']['departemen'].'"';
                  }else if($_SESSION['login']['level'] == 3){
                    $sqlReq = 'SELECT * FROM tb_ticket WHERE status_ticket = 1 AND id_requestor = '.$_SESSION['login']['id_user'];
                  }
                  $rowReq = $config->prepare($sqlReq);
                  $rowReq->execute();
                  $hasReq = $rowReq->rowCount();
                ?>
                <span class="info-box-number"><?= $hasReq ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">On Progress</span>
                <?php 
                  if($_SESSION['login']['level'] == 1){
                    $sqlPro = 'SELECT * FROM tb_ticket WHERE status_ticket = 2';
                  }else if($_SESSION['login']['level'] == 2){
                    $sqlPro = 'SELECT a.* FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.status_ticket = 2 AND b.departemen = "'.$_SESSION['login']['departemen'].'"';
                  }else if($_SESSION['login']['level'] == 3){
                    $sqlPro = 'SELECT * FROM tb_ticket WHERE status_ticket = 2 AND id_requestor = '.$_SESSION['login']['id_user'];
                  }
                  $rowPro = $config->prepare($sqlPro);
                  $rowPro->execute();
                  $hasPro = $rowPro->rowCount();
                ?>
                <span class="info-box-number"><?= $hasPro ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Completed</span>
                <?php 
                  if($_SESSION['login']['level'] == 1){
                    $sqlCom = 'SELECT * FROM tb_ticket WHERE status_ticket = 3';
                  }else if($_SESSION['login']['level'] == 2){
                    $sqlCom = 'SELECT a.* FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.status_ticket = 3 AND b.departemen = "'.$_SESSION['login']['departemen'].'"';
                  }else if($_SESSION['login']['level'] == 3){
                    $sqlCom = 'SELECT * FROM tb_ticket WHERE status_ticket = 3 AND id_requestor = '.$_SESSION['login']['id_user'];
                  }
                  $rowCom = $config->prepare($sqlCom);
                  $rowCom->execute();
                  $hasCom = $rowCom->rowCount();
                ?>
                <span class="info-box-number"><?= $hasCom ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cancelled</span>
                <?php 
                  if($_SESSION['login']['level'] == 1){
                    $sqlCan = 'SELECT * FROM tb_ticket WHERE status_ticket = 4';
                  }else if($_SESSION['login']['level'] == 2){
                    $sqlCan = 'SELECT a.* FROM tb_ticket a LEFT JOIN tb_user b ON a.id_requestor = b.id_user WHERE a.status_ticket = 4 AND b.departemen = "'.$_SESSION['login']['departemen'].'"';
                  }else if($_SESSION['login']['level'] == 3){
                    $sqlCan = 'SELECT * FROM tb_ticket WHERE status_ticket = 4 AND id_requestor = '.$_SESSION['login']['id_user'];
                  }
                  $rowCan = $config->prepare($sqlCan);
                  $rowCan->execute();
                  $hasCan = $rowCan->rowCount();
                ?>
                <span class="info-box-number"><?= $hasCan ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <canvas id="canvas"></canvas> 
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
      var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      var tahun = '<?= $thn ?>';
      var data = {
        labels: MONTHS,
        datasets: [{
          label: 'Requested',
          backgroundColor: 'lighblue',
          borderColor: 'lighblue',
          data: [
            <?php foreach($requested as $isiR){echo $isiR.',';} ?>
          ],
          fill: false,
        },{
          label: 'On Progress',
          backgroundColor: 'blue',
          borderColor: 'blue',
          data: [
            <?php foreach($progress as $isiP){echo $isiP.',';} ?>
          ],
          fill: false,
        },{
          label: 'Completed',
          backgroundColor: 'green',
          borderColor: 'green',
          data: [
            <?php foreach($completed as $isiCo){echo $isiCo.',';} ?>
          ],
          fill: false,
        },{
          label: 'Cancelled',
          backgroundColor: 'red',
          borderColor: 'red',
          data: [
            <?php foreach($cancelled as $isiCa){echo $isiCa.',';} ?>
          ],
          fill: false,
        }]
      };
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: "line",
        data: data,
        options: {
          title: {
            display: true,
            fontSize: 18,
            text: ['Ticket Per Bulan Tahun '+tahun]
          },
          responsive: true,
          legend: {
            display: true,
            position: 'bottom'
          },
          barValueSpacing: 10,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                min: 0,
              }
            }],
            xAxes: [{
              ticks: {
                beginAtZero: true,
                min: 0,
              }
            }],
          }
        }
      });
  </script>