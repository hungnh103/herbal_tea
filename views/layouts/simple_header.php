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
    <?php
    if($_SESSION['level'] == 3){
      echo "<link rel='stylesheet' type='text/css' href='assets/stylesheets/admin.css' />";
    }

    if($_SESSION['level'] == 2){
      echo "<link rel='stylesheet' type='text/css' href='assets/stylesheets/salesmanager.css' />";
    }
    ?>
    <script type="text/javascript" src="assets/javascripts/jquery.min.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

  </head>

  <body>
    <div class="website" <?php if($_GET['controller'] == "salesmanager") echo "id='salesmanager_mainpage'"; ?>>
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
          });
        </script>

        <div id="top_right">
          <?php
            echo "<div id='current_user'>";
              echo "<ul id='navigation'>";
                echo "<li>Xin chào <span style='font-weight: bold;'>$_SESSION[name]</span></li>";
                echo "<li class='mini_menu'><img src='assets/images/users/$_SESSION[avatar]'>";
                  echo "<ul>";
                    echo "<li style='border-top: none;'><a href='index.php?controller=user&uid=$_SESSION[uid]' class='mini_account'>Tài khoản</a></li>";
                    echo "<li><a href='index.php?controller=session&action=destroy' class='mini_logout'>Đăng xuất</a></li>";
                  echo "</ul>";
                echo "</li>";
              echo "</ul>";
            echo "</div>";
          ?>
        </div>

      </div>
      <!-- TOP -->

      <div class="clr"></div>
