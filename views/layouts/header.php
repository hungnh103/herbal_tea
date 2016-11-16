<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Quỳnh Phương Herbal Tea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/system/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/custom.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/btn_top.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/frontend.css" />
    <script type="text/javascript" src="assets/javascripts/jquery.min.js"></script>

  </head>

  <body>
    <div class="website">
      <div id="top">
        <div id="top_left">
          <ul>
            <li id="email">Email: lequynhphuong2408@gmail.com</li>
            <li id="hotline">Hotline: 01644183238</li>
          </ul>
        </div>

        <script type="text/javascript">
          $(document).ready(function(){
            $("#navigation li").hover(function(){
              $(this).find("ul:first").toggle();
            });
          });
        </script>

        <div id="top_right">
          <?php
          if(isset($_SESSION['level']) && ($_SESSION['level'] == 1)){
            echo "<div id='current_user'>";
              echo "<ul id='navigation'>";
                echo "<li>Xin chào <span style='font-weight: bold;'>$_SESSION[name]</span></li>";
                echo "<li class='mini_menu'><img src='assets/images/users/$_SESSION[avatar]'>";
                  echo "<ul>";
                    echo "<li style='border-top: none;'><a href='index.php?controller=user&uid=$_SESSION[uid]' class='mini_account'>Tài khoản</a></li>";
                    echo "<li><a href='#' class='mini_cart'>Giỏ hàng</a></li>";
                    echo "<li><a href='index.php?controller=session&action=destroy' class='mini_logout'>Đăng xuất</a></li>";
                  echo "</ul>";
                echo "</li>";
              echo "</ul>";
            echo "</div>";
          }else{
            echo "<ul class='visitor'>";
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
        <div id="logo"><a href="http://localhost/www/herbal_tea/"><img src="assets/images/system/logo.jpg"></a></div>
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
            <a href="http://localhost/www/herbal_tea/">Trang chủ</a>
          </li>
          <li><a href="index.php?controller=product">Trà thảo dược</a></li>
          <li><a href="index.php?controller=static_page&action=guide">Hướng dẫn mua hàng</a></li>
          <li><a href="#">Tin tức</a></li>
          <li><a href="#">Đăng ký làm đại lý</a></li>
          <li><a href="https://www.facebook.com/quynhphuongtrathaoduoc/" target="_blank">Fanpage</a></li>
          <li><a href="index.php?controller=static_page&action=intro">Giới thiệu</a></li>
        </ul>
      </div>
      <!-- MENU -->

      <div class="clr"></div>
