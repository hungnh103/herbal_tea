<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Herbal Tea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/custom.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/btn_top.css" />
    <script type="text/javascript" src="assets/javascripts/jquery.min.js"></script>

  </head>

  <body>
    <div id="website">
      <div id="top">
        <div id="top_left">
          <ul>
            <li id="email">Email: lequynhphuong2408@gmail.com</li>
            <li id="hotline">Hotline: 01644183238</li>
          </ul>
        </div>

        <div id="top_right">
          <?php
          if(isset($_SESSION['name'])){
            echo "xin chao $_SESSION[name]";
            echo "<a href='index.php?controller=session&action=destroy' id='logout'>Thoat</a>";
          }else{
            echo "<ul>";
              echo "<li id='signup'><a href='index.php?controller=user&action=signup'>Đăng ký</a></li>";
              echo "<li id='vertical_slash'>|</li>";
              echo "<li id='login'><a href='index.php?controller=session&action=new'>Đăng nhập</a></li>";
            echo "</ul>";
          }
          ?>
        </div>

      </div>
      <!-- TOP -->

      <div class="clr"></div>

      <div id="header">
        <div id="logo"></div>
        <div id="search">
          <form>
            <input type='text' placeholder='Tìm kiếm sản phẩm...' class='form-control' />
            <input type='submit' value='TÌM KIẾM' />
          </form>
        </div>
        <div id="cart">
          <img src="assets/images/system/cart.png">
          <div id="info_cart">
            <p>50 sản phẩm</p>
            <p>1.500.000 đồng</p>
          </div>

        </div>
        <div id="feature">
          <ul>
            <li id='assurance'>Uy tín, chất lượng</li>
            <li id='delivery'>Giao hàng toàn quốc</li>
          </ul>
        </div>
      </div>
      <!-- HEADER -->

      <div class="clr"></div>

      <div id="menu">
        <ul>
          <img src="assets/images/system/home.png">
          <li style="border-left:1px dotted #666;">
            <a href="index.php?controller=static_page&action=home">Trang chủ</a>
          </li>
          <li><a href="">Trà thảo dược</a></li>
          <li><a href="index.php?controller=static_page&action=guide">Hướng dẫn mua hàng</a></li>
          <li><a href="">Tin tức</a></li>
          <li><a href="">Đăng ký làm đại lý</a></li>
          <li><a href="https://www.facebook.com/quynhphuongtrathaoduoc/" target="_blank">Fanpage</a></li>
          <li><a href="index.php?controller=static_page&action=intro">Giới thiệu</a></li>
        </ul>
      </div>
      <!-- MENU -->

      <div class="clr"></div>
