<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<script type="text/javascript">
  function update_status() {
    if (!window.confirm("Bạn chắc chắn muốn cập nhật trạng thái của đơn hàng này?")) return false;
  }
</script>

<div id="manage_invoices">
  <div id="all_invoices">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th style="width: 80px; padding-bottom: 17px;">STT</th>
          <th style="width: 100px; padding-bottom: 17px;">Mã đơn hàng</th>
          <th style="width: 80px;">Số lượng sản phẩm</th>
          <th style="padding-bottom: 17px;">Tổng cộng</th>
          <th style="width: 100px;">Hình thức thanh toán</th>
          <th style="width: 150px; padding-bottom: 17px;">Thời điểm đặt hàng</th>
          <th style="width: 163px; padding-bottom: 17px;">Trạng thái</th>
          <th style="width: 135px; padding-bottom: 17px;">Cập nhật trạng thái</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if (!empty($data)) {
        $stt = 1;
        foreach ($data as $item) {
          echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td><a href='index.php?controller=salesmanager&resources=invoice&action=show&iid=$item[iid]' class='view_invoice_detail'>$item[iid]</a></td>";
            echo "<td>".number_format($item['products_amount'])."</td>";
            echo "<td>".number_format($item['total'])." ₫</td>";

            $payment_method = $item['payment_method'];
            if ($payment_method == 0) {
              echo "<td>N/A</td>";
            } elseif ($payment_method == 1) {
              echo "<td><span class='money'></span></td>";
            } elseif ($payment_method == 2) {
              echo "<td><span class='atm_card'></span></td>";
            }

            if (empty($item['order_date'])) {
              echo "<td>N/A</td>";
            } else {
              $timestamp = strtotime($item['order_date']);
              echo "<td>".date("H:i", $timestamp)." ngày ".date("d/m/Y", $timestamp)."</td>";
            }

            $status = $item['status'];
            switch ($status) {
              case "1":
                echo "<td><span class='in_buying'>đang mua hàng</span></td>";
                echo "<td></td>";
                break;
              case "2":
                echo "<td><span class='ordered'>đã đặt hàng</span></td>";
                echo "<td><a href='index.php?controller=salesmanager&resources=invoice&action=edit&iid=$item[iid]' onclick='return update_status();'><span class='icon_update'></span></a></td>";
                break;
              case "3":
                echo "<td><span class='in_progressing'>đang xử lý</span></td>";
                echo "<td><a href='index.php?controller=salesmanager&resources=invoice&action=edit&iid=$item[iid]' onclick='return update_status();'><span class='icon_update'></span></a></td>";
                break;
              case "4":
                echo "<td><span class='success_delivery'>giao hàng thành công</span></td>";
                echo "<td></td>";
                break;
            }
          echo "</tr>";

          $stt++;
        }
      } else {
        echo "<tr>";
          echo "<td colspan='8'>Chưa có đơn hàng nào</td>";
        echo "</tr>";
      }
      ?>
      </tbody>
    </table>
  </div>
</div>

<?php
loadview("layouts/footer");
?>
