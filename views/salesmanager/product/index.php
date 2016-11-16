<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<script type="text/javascript">
  function check_delete(){
    if(!window.confirm("Chắc chắn muốn xoá sản phẩm này?")) return false;
  }
</script>
<div id="other_action">
  <form id="product_filter">
    <table>
      <tr>
        <td colspan="2"><i>Tiêu chí hiển thị sản phẩm:</i></td>
      </tr>
      <tr>
        <td style="padding: 0 40px 0 5px;">Tình trạng</td>
        <td style="padding-bottom: 0;">Số lượng đã bán</td>
      </tr>
      <tr>
        <td style="padding-right: 40px;">
          <select class="form-control">
            <option>-- Tất cả --</option>
            <option style="color: #0362C5; font-weight: bold;">còn hàng</option>
            <option style="color: #EC971F; font-weight: bold;">sắp hết</option>
            <option style="color: #C9302C; font-weight: bold;">hết hàng</option>
          </select>
        </td>
        <td>
          <select class="form-control">
            <option>-----</option>
            <option>nhiều nhất > ít nhất</option>
            <option>ít nhất > nhiều nhất</option>
          </select>
        </td>
      </tr>
    </table>
  </form>

  <form id="search_product">
    <table>
      <tr>
        <td><i>Tìm kiếm sản phẩm</i></td>
        <td><input type="text" name="" class="form-control" placeholder="Nhập tên sản phẩm" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="Tìm" class="btn btn-primary" /></td>
      </tr>
    </table>
  </form>
</div>

<div class="clr"></div>



<div id="product_list">
  <a href="index.php?controller=salesmanager&resources=product&action=new" class="btn btn-success">Thêm</a>
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th class="index">STT</th>
        <th class="product_name">Tên sản phẩm</th>
        <th class="product_price">Giá</th>
        <th class="product_status">Tình trạng</th>
        <th class="sold_quantity">Đã bán</th>
        <th class="current_quantity">Hiện có</th>
        <th class="update_quantity" style="padding-bottom: 8px;">Cập nhật số lượng</th>
        <th class="edit">Sửa</th>
        <th class="del">Xoá</th>
        <th class="check">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(empty($data)){
        echo "<tr>";
            echo "<td colspan='10'>Chưa có sản phẩm nào</td>";
        echo "</tr>";
      }else{
        $stt = 1;
        foreach($data as $item){
          echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$item[name]</td>";

            if($item['packing_method'] == 1){
              echo "<td>".number_format($item['price'])." <span style='color: red;'>₫</span> / lọ thuỷ tinh</td>";
            }elseif($item['packing_method'] == 2){
              echo "<td>".number_format($item['price'])." <span style='color: red;'>₫</span> / gói to</td>";
            }else{
              echo "<td>".number_format($item['price'])." <span style='color: red;'>₫</span> / gói nhỏ</td>";
            }

            if($item['quantity'] > 50){
              echo "<td><span class='remain'>còn hàng</span></td>";
            }elseif((0 < $item['quantity']) && ($item['quantity'] <= 50)){
              echo "<td><span class='running_out'>sắp hết</span></td>";
            }else{
              echo "<td><span class='out_of_stock'>hết hàng</span></td>";
            }

            echo "<td>".number_format($item['sold'])."</td>";
            echo "<td>".number_format($item['quantity'])."</td>";
            echo "<td><a href='index.php?controller=salesmanager&resources=product&action=quantity_update&pid=$item[pid]'><span class='icon_update'></span></a></td>";
            echo "<td><a href='index.php?controller=salesmanager&resources=product&action=edit&pid=$item[pid]'><span class='icon_edit'></span></a></td>";
            echo "<td><a href='index.php?controller=salesmanager&resources=product&action=destroy&pid=$item[pid]' onclick='return check_delete();'><span class='icon_delete'></span></a></td>";
            echo "<td><input type='checkbox' /></td>";
          echo "</tr>";

          $stt++;
        }
      }
      ?>
    </tbody>
  </table>
</div>

<?php
loadview("layouts/footer");
?>
