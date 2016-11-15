<div id="salesmanager_mainpage_wrapper">
  <div id="left_content">
    <div id="left_menu">
      <ul>
        <li><a href="index.php?controller=salesmanager">Trang chính</a></li>
        <li><a href="javascript:void(0)">Trà thảo dược</a>
          <ul class="submenu">
            <li><a href="index.php?controller=salesmanager&resources=product">Kho hàng</a></li>
            <li><a href="index.php?controller=salesmanager&resources=effect">Công dụng nổi bật</a></li>
            <li><a href="index.php?controller=salesmanager&resources=invoice">Hoá đơn</a></li>
            <li><a href="index.php?controller=salesmanager&resources=request">Người dùng yêu cầu</a></li>
          </ul>
        </li>
        <li><a href="index.php?controller=salesmanager&resources=news">Tin tức</a></li>
        <li><a href="index.php?controller=salesmanager&resources=ask_and_answer">Hỏi đáp</a></li>
        <li><a href="index.php?controller=salesmanager&resources=remark">Bình luận</a></li>
      </ul>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#left_menu > ul > li > a").click(function(){
          $(this).next(".submenu").slideToggle();
        });
      });
    </script>
  </div>
  <div id="right_content">
    <div id="sub_navbar">
      <ul>
        <li><a href="#">Trang chính</a></li>
        <li><a href="#">> Công dụng nổi bật</a></li>
        <li><a href="#">> Thêm công dụng</a></li>
      </ul>
    </div>

    <div class="clr"></div>

    <div id="right_content_detail">