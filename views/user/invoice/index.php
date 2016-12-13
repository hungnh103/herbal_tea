<?php
loadview("layouts/header", $data);
?>

<div id="my_invoices_list" style="min-height: 242px;">
  <p>Danh sách đơn hàng của bạn</p>
  <table class='table table-bordered table-hover' style='width: 650px; margin-bottom: 30px;'>
    <thead>
      <tr>
        <th style='width: 100px;'>Mã đơn hàng</th>
        <th>Thời điểm đặt hàng</th>
        <th style='width: 150px;'>Số lượng sản phẩm</th>
        <th>Tổng cộng</th>
        <th style='width: 160px;'>Trạng thái</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($data['invoices'])) {
      foreach ($data['invoices'] as $item) {
        echo "<tr>";
          echo "<td><a href='index.php?controller=user&resources=invoice&action=show&iid=$item[iid]'>$item[iid]</a></td>";
          if (empty($item['order_date'])) {
            echo "<td>cập nhật sau</td>";
          } else {
            echo "<td>".date("d/m/Y", strtotime($item['order_date']))."</td>";
          }
          echo "<td>".number_format($item['products_amount'])."</td>";
          echo "<td>".number_format($item['total'])." ₫</td>";
          if ($item['status'] == 1) {
            echo "<td class='warning'>Đang mua hàng</td>";
          } elseif ($item['status'] == 2) {
            echo "<td class='bg-primary'>Đặt hàng thành công</td>";
          } elseif ($item['status'] == 3) {
            echo "<td class='info'>Đang xử lý</td>";
          } elseif ($item['status'] == 4) {
            echo "<td class='success'>Giao hàng thành công</td>";
          }
        echo "</tr>";
      }
    } else {
      echo "<tr>";
        echo "<td colspan='5'>Chưa có đơn hàng nào</td>";
      echo "</tr>";
    }
    ?>
    </tbody>
  </table>

</div>

<?php
loadview("layouts/footer");
?>
