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
  <div id="remark_and_reply">
    <div id="your_remark">
      <span>Nhận xét của bạn</span>
      <form>
        <table>
          <tr>
            <td><b>1. Đánh giá của bạn về sản phẩm này:</b> *****</td>
          </tr>
          <tr>
            <td><b>2. Viết bình luận của bạn:</b></td>
          </tr>
          <tr>
            <td>
              <textarea cols="50" rows="8" class="form-control" placeholder="Bình luận của bạn về sản phẩm này"></textarea>
            </td>
          </tr>
          <tr>
            <td style="text-align: right;"><input type="submit" name="ok" value="Gửi nhận xét" class="btn btn-info"></td>
          </tr>
        </table>
      </form>
    </div>

    <div id="remark_and_reply_list">
      <span>Khách hàng nhận xét về sản phẩm</span>

      <div class="customer_remark">
        <table>
          <tr>
            <td>
              <img src="assets/images/users/default_avatar.png" style="margin: 20px 55px 10px;" />
              <p style="margin: 0; font-weight: bold;">Nguyễn Huy Hùng</p>
            </td>
            <td style="border-left: 1px solid #E7E7E7; text-align: justify; padding: 0 35px; font-size: 11pt;">
              Quyển này của GS Diamond hay, nói nhiều về cách hành xử của con người cổ và thực ra vẫn còn tồn tại nhiều ngày nay. Nói về vai trò của tổ chức và nhà nước. Nếu bạn thích quyển Súng vi trùng và thép thì cũng sẽ rất thích quyển này. Tuy nhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếp những nơi ông đề cập đến trong sách, cách viết chen lẫn kể những câu chuyện của ông làm người đọc không bị nhàm.
            </td>
          </tr>
        </table>
      </div>

      <div class="customer_remark">
        <table>
          <tr>
            <td>
              <img src="assets/images/users/default_avatar.png" style="margin: 20px 55px 10px;" />
              <p style="margin: 0; font-weight: bold;">Nguyễn Huy Hùng</p>
            </td>
            <td style="border-left: 1px solid #E7E7E7; text-align: justify; padding: 0 35px; font-size: 11pt;">
              Quyển này của GS Diamond hay, nói nhiều về cách hành xử của con người cổ và thực ra vẫn còn tồn tại nhiều ngày nay. Nói về vai trò của tổ chức và nhà nước. Nếu bạn thích quyển Súng vi trùng và thép thì cũng sẽ rất thích quyển này. Tuy nhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếp những nơi ông đề cập đến trong sách, cách viết chen lẫn kể những câu chuyện của ông làm người đọc không bị nhàm.
            </td>
          </tr>
        </table>
      </div>

      <div class="customer_remark">
        <table>
          <tr>
            <td>
              <img src="assets/images/users/default_avatar.png" style="margin: 20px 55px 10px;" />
              <p style="margin: 0; font-weight: bold;">Nguyễn Huy Hùng</p>
            </td>
            <td style="border-left: 1px solid #E7E7E7; text-align: justify; padding: 0 35px; font-size: 11pt;">
              Quyển này của GS Diamond hay, nói nhiều về cách hành xử của con người cổ và thực ra vẫn còn tồn tại nhiều ngày nay. Nói về vai trò của tổ chức và nhà nước. Nếu bạn thích quyển Súng vi trùng và thép thì cũng sẽ rất thích quyển này. Tuy nhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếhiên là sách dịch nên đôi lúc đọc hơi dài dòng.
               Sách của GS Diamond hay ở chỗ ông tiếp cận trực tiếp những nơi ông đề cận trực tiếp những nơi ông đề cập đến trong sách, cách viết chen lẫn ếp những nơi ông đề cập đến trong sách, cách viết chen lẫn kể những câu chuyện của ông làm người đọc không bị nhàm.
            </td>
          </tr>
        </table>
      </div>



    </div>
  </div>
</div>
<?php
loadview("layouts/footer");
?>
