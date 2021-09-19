<?php 
  session_start();

  extract($_POST);
  if($proses == 'Sign In'){
    require_once "config.php";

    $sql = 'SELECT * FROM tb_user WHERE username = ? AND password = MD5(?)';
    $row = $config->prepare($sql);
    $row->execute(array($username, $password));;
    $jum = $row->rowCount();
    if($jum > 0){
      $_SESSION['login'] = $row->fetch();
      echo '<script>window.location="index.php";</script>';
    }else{
      $error = "Username atau Password anda salah..!!";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <?php if(!empty($error)){ ?>
      <div class="alert alert-danger">
        <?= $error; ?>
      </div>
    <?php } ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>Login</b></h1>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" class="btn btn-primary btn-block" name="proses" value="Sign In"></button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.min.js"></script>
</body>
</html>