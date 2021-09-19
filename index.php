<?php
  require_once 'config.php';
  session_start();

  $page = @$_GET['page'];
  $item = @$_GET['item'];

  if(!empty($_SESSION['login'])){
    include_once 'tpl/header.php';
    if(!empty($page)) {
      if ($page == 'beranda') {
        include 'beranda.php';
      } else if (file_exists('modul/' . $page . '/index.php')) {
        if (!empty($item)) {
          include 'modul/' . $page . '/' . $item . '.php';
        } else {
          include 'modul/' . $page . '/index.php';
        }
      } else {
        include 'error.php';
      }
    } else {
      include 'beranda.php';
    }
    include 'tpl/footer.php';
  }else{ 
    echo '<script>alert("Silahkan Login Terlebih Dahulu..!!");window.location="login.php";</script>';
  }
?>