<?php
loadview("layouts/header");
?>
<script type="text/javascript">
  function add(){
    var current_amount = document.getElementById("amount").value;
    document.getElementById("amount").value = parseInt(current_amount) + 1;
  }

  function minus(){
    var current_amount = document.getElementById("amount").value;
    if(current_amount > 1){
      document.getElementById("amount").value = parseInt(current_amount) - 1;
    }
  }

  function getAmount(){
    document.getElementById("hidden_amount").value = document.getElementById("amount").value;
  }
</script>

<div id="show_product">
  <div id="product_image">
    <img src="assets/images/products/<?php echo $data['product']['image']; ?>" />
  </div>
  <div id="product_abstract_info">
    <table>
      <tr>
        <td colspan="2"><h1><?php echo $data['product']['name']; ?></h1></td>
      </tr>
      <tr>
        <td colspan="2" style="color: green; font-weight: bold; font-size: 18pt;"><?php echo number_format($data['product']['price']); ?> ₫</td>
      </tr>
      <?php
      if($data['product']['quantity'] == 0){
        echo "<tr>";
          echo "<td colspan='2'><span>Hết hàng</span></td>";
        echo "</tr>";
      }elseif(($data['product']['quantity'] > 0) && ($data['product']['quantity'] <= 15)){
        echo "<tr>";
          echo "<td colspan='2'>Chỉ còn ".$data['product']['quantity']." sản phẩm</td>";
        echo "</tr>";
      }
      ?>
      <tr>
        <td>5 sao 5 sao</td>
        <td>(1234 đánh giá)</td>
      </tr>
      <?php
      if(isset($_SESSION['level'])){
        echo "<tr>";
          echo "<td colspan='2' style='line-height: 34px;'>";
            echo "Số lượng đặt mua";
            if($data['product']['quantity'] == 0){
              echo "<input type='button' id='minus' onclick='return minus();' disabled='disabled' />";
              echo "<input type='text' id='amount' value='1' class='form-control' style='width: 60px; float: right;' disabled='disabled' />";
              echo "<input type='button' id='add' onclick='return add();' disabled='disabled' />";
            }else{
              echo "<input type='button' id='minus' onclick='return minus();' />";
              echo "<input type='text' id='amount' value='1' class='form-control' style='width: 60px; float: right;' />";
              echo "<input type='button' id='add' onclick='return add();' />";
            }
          echo "</td>";
        echo "</tr>";
        echo "<tr>";
          echo "<td colspan='2'>";
            echo "<form action='index.php?controller=cart&action=add_product' method='post'>";
              echo "<input type='hidden' name='uid' value='$_SESSION[uid]' />";
              echo "<input type='hidden' name='pid' value='".$data['product']['pid']."' />";
              echo "<input type='hidden' name='name' value='".$data['product']['name']."' />";
              echo "<input type='hidden' name='quantity' id='hidden_amount' />";
              echo "<input type='hidden' name='price' value='".$data['product']['price']."' />";
              echo "<input type='hidden' name='image' value='".$data['product']['image']."' />";
              if($data['product']['quantity'] == 0){
                echo "<input type='submit' name='ok' value='Thêm vào giỏ hàng' onclick='getAmount();' class='btn btn-danger' disabled='disabled' />";
              }else{
                echo "<input type='submit' name='ok' value='Thêm vào giỏ hàng' onclick='getAmount();' class='btn btn-danger' />";
              }
            echo "</form>";
          echo "</td>";
        echo "</tr>";
      }else{
        echo "<tr>";
          echo "<td colspan='2'><span id='login_for_buying'><a href='index.php?controller=session&action=new'>Vui lòng đăng nhập để mua hàng</a></span></td>";
        echo "</tr>";
      }
      ?>
    </table>
  </div>

  <div class="clr"></div>

  <div id="product_detail">
    <span>Giới thiệu sản phẩm</span>
    <div>
      <?php
        echo $data['product']['description'];
      ?>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $("button").click(function(){
        a = $(this).val();
        for(i=1; i<=a; i++){
          $(":first-child", "button[value='"+i+"']").hide();
        }

        b = parseInt(a) + 1;
        for(i=b; i<=5; i++) {
          $(":first-child", "button[value='"+i+"']").show();
        }

        $("#vote_result").val(a);
      });
    });
  </script>

  <div id="remark_and_reply">
    <div id="your_remark">
      <span>Nhận xét của bạn</span>
      <?php
      if(!isset($_SESSION['level'])) {
        echo "<span id='login_to_remark'><a href='index.php?controller=session&action=new'>Vui lòng đăng nhập để nhận xét</a></span>";
      }
      ?>
      <div class="clr"></div>
      <p style="font-style: italic; margin-top: 10px;">(Đánh giá và bình luận của bạn sẽ được ban quản trị website duyệt trước khi hiển thị)</p>
      <table style="float: left;">
        <tr>
          <td><b style="display: block; float: left;">1. Đánh giá của bạn về sản phẩm này:</b>
            <div style="float: left; margin: -6px 0 0 10px;">
              <button value="1" <?php if(!isset($_SESSION['level'])) echo "disabled='disabled'"; ?>><img src="assets/images/system/gray_star.png"></button>
              <button value="2" <?php if(!isset($_SESSION['level'])) echo "disabled='disabled'"; ?>><img src="assets/images/system/gray_star.png"></button>
              <button value="3" <?php if(!isset($_SESSION['level'])) echo "disabled='disabled'"; ?>><img src="assets/images/system/gray_star.png"></button>
              <button value="4" <?php if(!isset($_SESSION['level'])) echo "disabled='disabled'"; ?>><img src="assets/images/system/gray_star.png"></button>
              <button value="5" <?php if(!isset($_SESSION['level'])) echo "disabled='disabled'"; ?>><img src="assets/images/system/gray_star.png"></button>
            </div>
          </td>
        </tr>
        <tr>
          <td><b>2. Viết bình luận của bạn:</b></td>
        </tr>
        <form action="index.php?controller=product&action=show&pid=<?php echo $data['product']['pid']; ?>" method="post">
          <tr>
            <td>
              <textarea cols="50" rows="8" name="content" class="form-control" placeholder="Bình luận của bạn về sản phẩm này" <?php if(!isset($_SESSION['level'])) echo "disabled='disabled'"; ?>></textarea>
            </td>
          </tr>
          <tr>
            <td style="text-align: right;">
              <input type="hidden" name="score" id="vote_result" value="0">
              <input type="submit" name="ok" value="Gửi nhận xét" class="btn btn-info" <?php if(!isset($_SESSION['level'])) echo "disabled='disabled'"; ?>>
            </td>
          </tr>
        </form>
      </table>
      <div class="error" style="float: right; padding: 0;">
        <?php
        if(!empty($data['error'])) {
          echo "<ul>";
          foreach ($data['error'] as $item) {
            echo "<li>$item</li>";
          }
          echo "</ul>";
        }
        ?>
      </div>

    </div>
      <div class="clr"></div>

    <div id="remark_and_reply_list">
      <span>Khách hàng nhận xét về sản phẩm</span>
      <?php
      if(empty($data['remark'])) {
        echo "<p>Chưa có nhận xét nào về sản phẩm này</p>";
      } else {
        foreach ($data['remark'] as $item) {
          echo "<div class='customer_remark'>";
            echo "<table>";
              echo "<tr>";
                echo "<td>";
                  echo "<img src='assets/images/users/$item[avatar]' style='margin: 20px 55px 10px;' />";
                  echo "<p style='margin: 0; font-weight: bold;'>$item[name]</p>";
                echo "</td>";
                echo "<td style='border-left: 1px solid #E7E7E7; text-align: justify; padding: 0 35px; font-size: 11pt;'>";
                  echo "<p>";
                  for ($i=1; $i<=$item['rating']; $i++){
                    echo "<img src='assets/images/system/star.png' style='width: 16px; height: 16px;'>";
                  }
                  for($i=$item['rating']+1; $i<=5; $i++){
                    echo "<img src='assets/images/system/gray_star.png' style='width: 16px; height: 16px;'>";
                  }
                  echo "</p>";
                  echo $item['content'];
                echo "</td>";
              echo "</tr>";
            echo "</table>";
          echo "</div>";
        }
      }
      ?>

    </div>
  </div>
</div>
<?php
loadview("layouts/footer");
?>
