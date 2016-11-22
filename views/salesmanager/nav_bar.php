<div id="salesmanager_mainpage_wrapper">
  <div id="left_content">
    <div id="left_menu">
      <ul>
        <li><a href="index.php?controller=salesmanager">Trang chính</a></li>
        <li><a href="javascript:void(0)">Trà thảo dược</a>
          <ul class="submenu">
            <li><a href="index.php?controller=salesmanager&resources=product">Kho hàng</a></li>
            <li><a href="index.php?controller=salesmanager&resources=effect">Công dụng nổi bật</a></li>
            <li><a href="index.php?controller=salesmanager&resources=invoice">Đơn hàng</a></li>
          </ul>
        </li>
        <li><a href="index.php?controller=salesmanager&resources=news">Tin tức</a></li>
        <li><a href="index.php?controller=salesmanager&resources=ask_and_answer">Hỏi đáp</a></li>
        <li><a href="index.php?controller=salesmanager&resources=remark">Ý kiến người dùng</a></li>
      </ul>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#left_menu > ul > li > a").hover(function(){
          //$(this).next(".submenu").slideToggle();
        });
      });
    </script>
  </div>
  <div id="right_content">
    <div id="sub_navbar">
      <ul>
        <li><a href="index.php?controller=salesmanager">Trang chính</a></li>
        <?php
        if(isset($_GET['resources'])){
          switch($_GET['resources']){
            case "product": echo "<li><a href='index.php?controller=salesmanager&resources=product'>> Kho hàng</a></li>"; break;
            case "effect": echo "<li><a href='index.php?controller=salesmanager&resources=effect'>> Công dụng nổi bật</a></li>"; break;
            case "invoice": echo "<li><a href='index.php?controller=salesmanager&resources=invoice'>> Đơn hàng</a></li>"; break;
            case "news": echo "<li><a href='index.php?controller=salesmanager&resources=news'>> Tin tức</a></li>"; break;
            case "remark": echo "<li><a href='index.php?controller=salesmanager&resources=remark'>> Ý kiến người dùng</a></li>"; break;
          }
        }

        if(isset($_GET['action'])){
          switch($_GET['action']){
            case "new": echo "<li>> Thêm</li>"; break;
            case "edit": echo "<li>> Sửa</li>"; break;
            case "quantity_update": echo "<li>> Cập nhật số lượng</li>"; break;
            case "show": echo "<li>>Xem chi tiết</li>"; break;
          }
        }
        ?>
      </ul>
    </div>

    <div class="clr"></div>

    <div id="right_content_detail">
