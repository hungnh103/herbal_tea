<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>

<div id="list_invoice_detail">
  <div id="left_list_invoice_detail">
    <p><span style="font-weight: bold;">Mã đơn hàng:</span> <?php echo $data['invoice']['iid']; ?></p>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th style="width: 50px;">STT</th>
          <th style="width: 200px;">Tên sản phẩm</th>
          <th style="width: 120px;">Số lượng</th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $stt = 1;
      foreach ($data['invoice_detail'] as $item) {
        echo "<tr>";
          echo "<td>$stt</td>";
          echo "<td>$item[name]</td>";
          echo "<td>".number_format($item['quantity'])."</td>";
          echo "<td>".number_format($item['quantity'] * $item['price'])." ₫</td>";
        echo "</tr>";

        $stt++;
      }
      ?>
        <tr style="font-weight: bold;">
          <td colspan="2">Tổng cộng</td>
          <td><?php echo number_format($data['invoice']['products_amount']); ?></td>
          <td style="color: #f00;"><?php echo number_format($data['invoice']['total']); ?> ₫</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div id="right_list_invoice_detail">
  <?php
  $status = $data['invoice']['status'];
  if ($status == 1) {
    echo "<p>Trạng thái: <span class='in_buying'>đang mua hàng</span></p>";
  } else {
    switch ($status) {
      case "2": echo "<p>Trạng thái: <span class='ordered'>đã đặt hàng</span></p>"; break;
      case "3": echo "<p>Trạng thái: <span class='in_progressing'>đang xử lý</span></p>"; break;
      case "4": echo "<p>Trạng thái: <span class='success_delivery'>giao hàng thành công</span></p>"; break;
    }

    $timestamp = strtotime($data['invoice']['order_date']);
    echo "<p>Thời điểm đặt hàng: <span style='font-weight: normal;'>".date("H:i", $timestamp)." ngày ".date("d:m:Y", $timestamp)."</span></p>";
    echo "<p>Địa chỉ giao hàng</p>";
    echo "<div>";
      echo "<p style='font-weight: bold; font-size: 12pt;'>".$data['addr']['fullname']."</p>";
      echo "<p>Địa chỉ: ".$data['addr']['address'].", ".$data['addr']['comm_name'].", ".$data['addr']['dist_name'].", ".$data['addr']['prov_name']."</p>";
      echo "<p style='margin-bottom: 0px;'>Số điện thoại: ".$data['addr']['telephone']."</p>";
    echo "</div>";
    if ($data['invoice']['payment_method'] == 1) {
      echo "<p>Hình thức thanh toán: tiền mặt</p>";
    } else {
      echo "<p>Hình thức thanh toán: chuyển khoản</p>";
      echo "<div>";
        echo "<p>Tên chủ tài khoản: ".$data['invoice']['account_holder']."</p>";
        echo "<p>Số thẻ: ".$data['invoice']['account_number']."</p>";
        echo "<p style='margin-bottom: 0px;'>Ngân hàng: ".$data['invoice']['bank']."</p>";
      echo "</div>";
    }
  }
  ?>
  </div>
</div>

<?php
loadview("layouts/footer");
?>
