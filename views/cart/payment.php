<?php
loadview("layouts/header", $data);
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#via_atm").change(function(){
      $(".atm_account_info").slideDown();
    });

    $("#in_place").change(function(){
      $(".atm_account_info").slideUp();
    });
  });
</script>

<div id="cart_payment">
  <div id="payment_method">
    <p style="font-size: 12pt; font-weight: bold;">Bước 3. Chọn hình thức thanh toán</p>
    <div id="type_of_payment_method">
      <form action="index.php?controller=cart&action=payment" method="post">
        <table class="table-hover">
          <tr>
            <td style="padding: 0px 5px;"><input type="radio" name="payment_method" value="1" id="in_place"></td>
            <td style="padding: 0px 5px;"><label for="in_place">Thanh toán khi nhận hàng</label></td>
          </tr>
          <tr>
            <td style="padding: 0px 5px;"><input type="radio" name="payment_method" value="2" id="via_atm" <?php if(!empty($data['atm'])) echo "checked='checked'"; ?>></td>
            <td style="padding: 0px 5px;"><label for="via_atm">Thanh toán qua thẻ ATM</label></td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 70px;">
              <div class="atm_account_info" <?php if(!empty($data['atm'])) echo "style='display: block;'"; ?>>
                <table>
                  <tr>
                    <td>Tên chủ tài khoản</td>
                    <td><input type="text" name="account_holder" class="form-control" style="width: 230px;"></td>
                  </tr>
                  <tr>
                    <td>Số tài khoản</td>
                    <td><input type="text" name="account_number" class="form-control" style="width: 230px;"></td>
                  </tr>
                  <tr>
                    <td>Tên ngân hàng</td>
                    <td><input type="text" name="bank" class="form-control" style="width: 230px;"></td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="ok" class="btn btn-danger" style="padding: 10px 30px;" value="ĐẶT MUA"> (Vui lòng kiểm tra lại đơn hàng trước khi đặt mua)</td>
          </tr>
        </table>
        <?php
        echo "<input type='hidden' name='addrid' value='".$data['data']['addrid']."'>";
        echo "<input type='hidden' name='fullname' value='".$data['data']['fullname']."'>";
        echo "<input type='hidden' name='address' value='".$data['data']['address']."'>";
        echo "<input type='hidden' name='comm_name' value='".$data['data']['comm_name']."'>";
        echo "<input type='hidden' name='dist_name' value='".$data['data']['dist_name']."'>";
        echo "<input type='hidden' name='prov_name' value='".$data['data']['prov_name']."'>";
        echo "<input type='hidden' name='telephone' value='".$data['data']['telephone']."'>";
        ?>
      </form>
    </div>

    <div class="error">
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

  <div id="addr_invoice_detail">
    <div class="addr_info">
      <p style="font-weight: bold; font-size: 11pt;"> 2. Địa chỉ giao hàng</p>
      <a href="index.php?controller=cart&action=shipping"><span>Sửa</span></a>
      <?php
      echo "<p style='font-weight: bold; font-size: 12pt;'>".$data['data']['fullname']."</p>";
      echo "<p>Địa chỉ: ".$data['data']['address'].", ".$data['data']['comm_name'].", ".$data['data']['dist_name'].", ".$data['data']['prov_name']."</p>";
      echo "<p>Số điện thoại: ".$data['data']['telephone']."</p>";
      ?>
    </div>
    <div class="invoice_detail_info">
      <p style="font-weight: bold; font-size: 11pt;">1. Giỏ hàng (<?php echo $_SESSION['products_amount']; ?> sản phẩm)</p>
      <a href="index.php?controller=cart"><span style="font-weight: normal;">Sửa</span></a>
      <table style="margin-left: 50px;">
        <?php
        foreach ($data['product'] as $item) {
          echo "<tr>";
            echo "<td style='width: 150px;'><span>$item[quantity] x</span> <a href='index.php?controller=product&action=show&pid=$item[pid]' class='product_in_cart'>$item[name]</a></td>";
            echo "<td>".number_format($item['price'] * $item['quantity'])." ₫</td>";
          echo "</tr>";
        }
        ?>
        <tr>
          <td><span>Tổng cộng</span></td>
          <td><span style="font-size: 13pt; color: #f00;"><?php echo number_format($_SESSION['total']); ?> ₫</span></td>
        </tr>
      </table>
    </div>
  </div>
</div>

<?php
loadview("layouts/footer");
?>
