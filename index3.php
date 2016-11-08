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
    <div id="signup_form">
      <button></button>
      <form id="sign_form_popup" action="" method="">
        <table>
          <tr>
            <td>Tên người dùng</td>
            <td style="width: 300px;"><input type="text" name="txtuser" class="form-control"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td style="width: 300px;"><input type="text" name="txtemail" class="form-control"></td>
          </tr>
          <tr>
            <td>Mật khẩu</td>
            <td style="width: 300px;"><input type="password" name="txtpass" class="form-control"></td>
          </tr>
          <tr>
            <td>Xác nhận mật khẩu</td>
            <td style="width: 300px;"><input type="password" name="txtpass2" class="form-control"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="ok" value="Đăng ký" class="btn btn-info"></td>
          </tr>
          <tr>
            <td></td>
            <td>Đã có tài khoản? <a href="javascript:void(0)" class="change_to_login_form">Đăng nhập</a></td>
          </tr>
        </table>
      </form>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#signup_form button").click(function(){
          $("#signup_form").hide();
        });

        $(".change_to_login_form").click(function(){
          $("#signup_form").hide();
          $("#login_form").show();
        });
      });
    </script>


    <div id="login_form">
      <button></button>
      <form id="login_form_popup" action="" method="">
        <table>
          <tr>
            <td>Email</td>
            <td style="width: 300px;"><input type="text" name="txtuser" class="form-control"></td>
          </tr>
          <tr>
            <td>Mật khẩu</td>
            <td style="width: 300px;"><input type="password" name="txtpass" class="form-control"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="ok" value="Đăng nhập" class="btn btn-info"></td>
          </tr>
          <tr>
            <td></td>
            <td>Chưa có tài khoản? <a href="javascript:void(0)" class="change_to_signup_form">Đăng ký</a></td>
          </tr>
        </table>
      </form>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#login_form button").click(function(){
          $("#login_form").hide();
        });

        $(".change_to_signup_form").click(function(){
          $("#login_form").hide();
          $("#signup_form").show();
        });
      });
    </script>

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
              echo "<li id='signup'><a href='javascript:void(0)'>Đăng ký</a></li>";
              echo "<li id='vertical_slash'>|</li>";
              echo "<li id='login'><a href='javascript:void(0)'>Đăng nhập</a></li>";
            echo "</ul>";
          }
          ?>
        </div>

        <script type="text/javascript">
          $(document).ready(function(){
            $("#login").click(function(){
              $("#login_form").show();
            });

            $("#signup").click(function(){
              $("#signup_form").show();
            });
          });
        </script>
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

      <div id="info">
        <div id="slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

                <div class="item active">
                  <!-- <img src="..." alt="..."> -->
                  <img src="assets/images/news/kitchen_adventurer_lemon.jpg" style="width: 630px; height: 300px;">
                  <div class="carousel-caption">
                    <h2>abc</h2>
                  </div>
                </div>

                <div class="item">
                  <!-- <img src="..." alt="..."> -->
                  <img src="assets/images/news/kitchen_adventurer_donut.jpg" style="width: 630px; height: 300px;">
                  <div class="carousel-caption">
                    <h2>cai thu 2</h2>
                  </div>
                </div>

                <div class="item">
                  <!-- <img src="..." alt="..."> -->
                  <img src="assets/images/news/kitchen_adventurer_caramel.jpg" style="width: 630px; height: 300px;">
                  <div class="carousel-caption">
                    <h2>cai thu 3</h2>
                  </div>
                </div>

              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

        </div>
        <!-- SLIDER -->
        <!-- SLIDER -->
        <!-- SLIDER -->


        <div id="ads">
          <div id="up_ads">
            <a href=""><img src="assets/images/system/consult.png"></a>
          </div>
          <div id="down_ads">
            <p>Đăng ký nhận thông báo từ website</p>
            <form>
              <input type="text" placeholder="Email của bạn" class="form-control">
              <button class="btn btn-info">Đăng ký</button>
            </form>
          </div>
        </div>

      </div>
      <!-- INFO -->
      <!-- INFO -->
      <!-- INFO -->

      <div class="clr"></div>

      <div id="main">
        <div id="main_left">
          <h3>SẢN PHẨM BÁN CHẠY</h3>
          <ul>
            <li style='border-top: 2px solid #FDD504;'>
              <div class="thumbnail">
                <a href=""><img src="assets/images/products/new.png"></a>
              </div>
              <div class="abstract_info">
                <a href="">Hoa hồng</a><span>new</span>
                <p></p>
              </div>
            </li>
            <li>
              <div class="thumbnail">
                <a href=""><img src="assets/images/products/new.png"></a>
              </div>
              <div class="abstract_info">
                <a href="">Hoa hồng</a><span>new</span>
                <p></p>
              </div>
            </li>
            <li>
              <div class="thumbnail">
                <a href=""><img src="assets/images/products/new.png"></a>
              </div>
              <div class="abstract_info">
                <a href="">Hoa hồng</a>
                <p></p>
              </div>
            </li>
            <li>
              <div class="thumbnail">
                <a href=""><img src="assets/images/products/new.png"></a>
              </div>
              <div class="abstract_info">
                <a href="">Hoa hồng</a><span>new</span>
                <p></p>
              </div>
            </li>
            <li>
              <div class="thumbnail">
                <a href=""><img src="assets/images/products/new.png"></a>
              </div>
              <div class="abstract_info">
                <a href="">Hoa hồng</a>
                <p></p>
              </div>
            </li>
            <li>
              <div class="thumbnail">
                <a href=""><img src="assets/images/products/new.png"></a>
              </div>
              <div class="abstract_info">
                <a href="">Hoa hồng</a>
                <p></p>
              </div>
            </li>
          </ul>
        </div>

        <div id="main_right">
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
          <div class="product">
            <a href="">
              <img src="assets/images/products/hoangky.jpg">
              <h2 class='product_name'>Hoa hồng</h2>
              <p class='product_price'>138.000₫</p>
            </a>
          </div>
        </div>

      </div>

      <div class="clr"></div>

      <div id="footer">
        <ul>
          <li>Trà thảo dược Quỳnh Phương</li>
          <li>Sản phẩm từ thiên nhiên</li>
          <li>Copyright 2016 &copy; qpherbaltea.vn</li>
        </ul>
      </div>

      <div class="footer">
        <a class="btn-top" href="javascript:void(0);" title="Top"></a>
      </div>

      <script type="text/javascript" src="assets/javascripts/bootstrap.min.js"></script>
      <script type="text/javascript" src="assets/javascripts/btn_top.js"></script>

    </div>
  </body>
</html>
