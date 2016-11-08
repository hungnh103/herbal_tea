<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Herbal Tea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/stylesheets/bootstrap.min.css" />
    <link rel="stylesheet" href="" />
  </head>
  <body>
    <header>
      <ul>
        <li><a href="index.php?controller=static_page&action=home">Trang chu</a></li>
        <li><a href="">San pham</a></li>
        <li><a href="index.php?controller=static_page&action=guide">Huong dan mua hang</a></li>
        <li><a href="">Tin tuc</a></li>
        <li><a href="index.php?controller=static_page&action=intro">Gioi thieu</a></li>
        <li><a href="">Hoi dap - Tu van</a></li>
      </ul>
      <?php
      if(isset($_SESSION['name'])){
        echo "xin chao $_SESSION[name]";
        echo "<a href='index.php?controller=session&action=destroy'>Thoat</a>";
      }else{
        echo "<a href='index.php?controller=session&action=new'>Dang nhap</a>";
      }

      ?>
      <br />
      <br />
      <br />
      <br />
      <br />
    </header>
