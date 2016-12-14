<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>
      <?php
        if (!empty($data['title_tag'])) {
          echo "$data[title_tag] | Quỳnh Phương Herbal Tea";
        } else {
          echo "Quỳnh Phương Herbal Tea - Dược liệu thiên nhiên tốt cho sức khoẻ";
        }
      ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASEPATH; ?>assets/images/system/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH; ?>assets/stylesheets/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH; ?>assets/stylesheets/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH; ?>assets/stylesheets/btn_top.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASEPATH; ?>assets/stylesheets/frontend.css" />
    <script type="text/javascript" src="<?php echo BASEPATH; ?>assets/javascripts/jquery.min.js"></script>

  </head>

  <body>

    <div class="website">
      <div id="top">
        <div id="top_left">
          <ul>
            <li id="email">Email: lequynhphuong2408@gmail.com</li>
            <li id="hotline">Hotline: 0164.418.3238</li>
          </ul>
        </div>

        <script type="text/javascript">
          $(document).ready(function(){
            $("#navigation li").hover(function(){
              $(this).find("ul:first").toggle();
            });

            $("#navigation .mini_menu").mouseenter(function(){
              $("#highlight").show();
            });

            $("#navigation .mini_menu").mouseleave(function(){
              $("#highlight").hide();
            });
          });
        </script>

        <div id="top_right">
          <?php
          if(isset($_SESSION['level']) && ($_SESSION['level'] == 1)){
            echo "<div id='current_user'>";
              echo "<ul id='navigation'>";
                echo "<li>Xin chào <span style='font-weight: bold;'>$_SESSION[name]</span></li>";
                echo "<li class='mini_menu'><img src='".BASEPATH."assets/images/users/$_SESSION[avatar]'>";
                  echo "<ul>";
                    echo "<li style='border-top: none;'><a href='".BASEPATH."user/account/uid/$_SESSION[uid]' class='mini_account'>Tài khoản</a></li>";
                    echo "<li><a href='".BASEPATH."user/invoice/index/uid/$_SESSION[uid]' class='mini_invoices'>Đơn hàng</a></li>";
                    echo "<li><a href='".BASEPATH."session/destroy' class='mini_logout'>Đăng xuất</a></li>";
                  echo "</ul>";
                echo "</li>";
              echo "</ul>";
            echo "</div>";
          }else{
            echo "<ul class='visitor'>";
              echo "<li id='signup'><a href='".BASEPATH."user/signup'>Đăng ký</a></li>";
              echo "<li id='vertical_slash'>|</li>";
              echo "<li id='login'><a href='".BASEPATH."session/new'>Đăng nhập</a></li>";
            echo "</ul>";
          }
          ?>
        </div>

      </div>
      <!-- TOP -->
      <div id="highlight"></div>


      <div class="clr"></div>

      <div id="header">
        <div id="logo"><a href="http://localhost/www/herbal_tea/"><img src="http://localhost/www/herbal_tea/assets/images/system/logo.jpg"></a></div>
        <div id="search">
          <form action='index.php?controller=product&action=search' method='post'>
            <input type='text' name='keyword' placeholder='Nhập tên sản phẩm...' class='form-control' />
            <input type='submit' name='ok' value='TÌM KIẾM' />
          </form>
        </div>

        <div id="cart">
          <a href="<?php echo BASEPATH; ?>cart/show"><img src="http://localhost/www/herbal_tea/assets/images/system/cart.png"></a>
          <div id="info_cart">
            <?php
            if(isset($_SESSION['level'])){
              echo "<p>".number_format($_SESSION['products_amount'])." sản phẩm</p>";
              echo "<p>".number_format($_SESSION['total'])." đồng</p>";
            }else{
              echo "<p>0 sản phẩm</p>";
              echo "<p>0 đồng</p>";
            }
            ?>
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
          <img src="http://localhost/www/herbal_tea/assets/images/system/home.png">
          <li style="border-left:1px dotted #666;">
            <a href="http://localhost/www/herbal_tea/">Trang chủ</a>
          </li>
          <li><a href="index.php?controller=product">Trà thảo dược</a></li>
          <li><a href="index.php?controller=static_page&action=guide">Hướng dẫn mua hàng</a></li>
          <li><a href="index.php?controller=news">Tin tức</a></li>
          <li><a href="index.php?controller=static_page&action=agency_register">Đăng ký làm đại lý</a></li>
          <li><a href="https://www.facebook.com/QuynhPhuongHerbalTea/" target="_blank">Fanpage</a></li>
          <li><a href="index.php?controller=static_page&action=intro">Giới thiệu</a></li>
        </ul>
      </div>
      <!-- MENU -->

      <div class="clr"></div>
