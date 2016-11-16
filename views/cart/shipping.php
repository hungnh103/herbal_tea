<?php
loadview("layouts/header");
?>

<div id="cart_shipping">
  <p style="font-size: 12pt; font-weight: bold;">Bước 2. Chọn địa chỉ giao hàng</p>

  <?php
  if (!empty($data['addr'])) {
    foreach ($data['addr'] as $item) {
      echo "<div class='shipping_address'>";
        echo "<form action='index.php?controller=cart&action=payment' method='post'>";
          echo "<p style='font-weight: bold; font-size: 11pt;'>$item[fullname]</p>";
          echo "<p>Địa chỉ: $item[address], $item[comm_name], $item[dist_name], $item[prov_name]</p>";
          echo "<p>Số điện thoại: $item[telephone]</p>";
          echo "<input type='hidden' name='addrid' value='$item[addrid]'>";
          echo "<input type='hidden' name='fullname' value='$item[fullname]'>";
          echo "<input type='hidden' name='address' value='$item[address]'>";
          echo "<input type='hidden' name='comm_name' value='$item[comm_name]'>";
          echo "<input type='hidden' name='dist_name' value='$item[dist_name]'>";
          echo "<input type='hidden' name='prov_name' value='$item[prov_name]'>";
          echo "<input type='hidden' name='telephone' value='$item[telephone]'>";
          echo "<input type='submit' class='btn' value='Giao hàng đến địa chỉ này'>";
        echo "</form>";
      echo "</div>";
    }
    echo "<div class='clr'></div>";
    echo "<p style='margin-left: 20px;'>Chỉnh sửa sổ địa chỉ <a href='index.php?controller=user&uid=$_SESSION[uid]'>tại đây</a></p>";
  } else {
    echo "<p id='no_addr'>Bạn chưa có địa chỉ giao hàng. Vui lòng <a href='index.php?controller=user&resources=address&action=new'>tạo sổ địa chỉ mới</a>.</p>";
  }
  ?>
</div>

<?php
loadview("layouts/footer");
?>
