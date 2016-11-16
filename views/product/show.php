<?php
loadview("layouts/header");
?>
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
      }elseif(($data['product']['quantity'] > 0) && ($data['product']['quantity'] <= 50)){
        echo "<tr>";
          echo "<td colspan='2'>Còn ".$data['product']['quantity']." sản phẩm</td>";
        echo "</tr>";
      }
      ?>
      <tr>
        <td>5 sao 5 sao</td>
        <td>(1234 đánh giá)</td>
      </tr>
      <tr>
        <td colspan="2" style="line-height: 34px;">
          Số lượng đặt mua
          <input type="button" id="minus" <?php if($data['product']['quantity'] == 0) echo "disabled='disabled'"; ?> />
          <input type="text" value="1" class="form-control" style="width: 60px; float: right;" <?php if($data['product']['quantity'] == 0) echo "disabled='disabled'"; ?> />
          <input type="button" id="add" <?php if($data['product']['quantity'] == 0) echo "disabled='disabled'"; ?> />
        </td>
      </tr>
      <tr>
        <td colspan="2"><a href='#' class="btn btn-danger" <?php if($data['product']['quantity'] == 0) echo "disabled='disabled'"; ?>>Thêm vào giỏ hàng</a></td>
      </tr>
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
