<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>

<fieldset id="view_statistics">
  <legend>Tóm tắt tình hình kinh doanh</legend>
  <div class='stat_revenue'>
    <p>* Doanh thu tháng này: <span style="font-weight: bold; color: red;"><?php echo number_format($data['avenue']['current_month_total']['sum(total)']); ?> ₫</span></p>
    <p>* Tổng doanh thu: <span style="font-weight: bold;"><?php echo number_format($data['avenue']['total']['sum(total)']); ?> ₫</span></p>
  </div>

  <div class='stat_accounts'>
    <table>
      <tr>
        <td>* Hệ thống hiện có <span style='font-weight: bold;'><?php echo number_format($data['user']['all']); ?></span> tài khoản, bao gồm:</td>
      </tr>
      <tr>
        <td>
          <ul style='margin-left: 30px;'>
            <li><?php echo number_format($data['user']['member']); ?> <span style='font-weight: bold;'>thành viên</span></li>
            <li><?php echo number_format($data['user']['salesmanager']); ?> <span style='font-weight: bold; color: blue;'>quản lý bán hàng</span></li>
            <li><?php echo number_format($data['user']['admin']); ?> <span style='font-weight: bold; color: red;'>quản trị viên</span></li>
          </ul>
        </td>
      </tr>
    </table>
  </div>

  <div class='stat_products'>
    <table>
      <tr>
        <td>* Thông tin sản phẩm</td>
      </tr>
      <tr>
        <td>
          <ul style='margin-left: 30px;'>
            <li>Số loại sản phẩm: <?php echo number_format($data['product']['types_amount']); ?></li>
            <li>Hiện có: <?php echo number_format($data['product']['is_present_amount']['sum(quantity)']); ?></li>
            <li>Đã bán: <?php echo number_format($data['product']['sold_amount']['sum(sold)']); ?></li>
          </ul>
        </td>
      </tr>
    </table>
  </div>
</fieldset>
<?php
loadview("layouts/footer");
?>
