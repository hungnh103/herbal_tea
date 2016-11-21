<?php
loadview("layouts/header");
?>

<div id="view_invoice_detail">
  <a href="index.php?controller=user&resources=invoice&action=index&uid=17" class="btn btn-info">← Danh sách hoá đơn</a>
  <div class="products_list">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th style="width: 60px;">STT</th>
          <th>Tên sản phẩm</th>
          <th style="width: 130px;">Số lượng</th>
          <th style="width: 170px;">Thành tiền</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $stt = 1;
      foreach ($data['product'] as $item) {
        echo "<tr>";
          echo "<td>$stt</td>";
          echo "<td><a href='index.php?controller=product&action=show&pid=$item[pid]'>$item[name]</a></td>";
          echo "<td>$item[quantity]</td>";
          echo "<td>".number_format($item['price'] * $item['quantity'])." ₫</td>";
        echo "</tr>";

        $stt++;
      }
      ?>
        <tr style="font-weight: bold;">
          <td colspan='2'>Tổng cộng</td>
          <td><?php echo number_format($data['invoice']['products_amount']); ?></td>
          <td style="color: #f00;"><?php echo number_format($data['invoice']['total']); ?> ₫</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="respective_addr">
    <p style="font-size: 11pt; font-weight: bold;">Địa chỉ giao hàng</p>
    <div>
    <?php
    if (!empty($data['addr'])) {
      echo "<p style='font-size: 12pt; font-weight: bold;'>".$data['addr']['fullname']."</p>";
      echo "<p>Địa chỉ: ".$data['addr']['address'].", ".$data['addr']['comm_name'].", ".$data['addr']['dist_name'].", ".$data['addr']['prov_name']."</p>";
      echo "<p>Số điện thoại: ".$data['addr']['telephone']."</p>";
    } else {
      echo "<p>Địa chỉ sẽ được cập nhật sau khi đặt hàng</p>";
    }
    ?>
    </div>
  </div>
</div>

<?php
loadview("layouts/footer");
?>
