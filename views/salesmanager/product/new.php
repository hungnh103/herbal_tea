<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<div id="add_edit_product_interface">
  <form action="index.php?controller=salesmanager&resources=product&action=new" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td style="width: 130px;">Tên sản phẩm</td>
        <td><input type="text" name="txtname" class="form-control" style="width: 400px;" /></td>
      </tr>
      <tr>
        <td>Công dụng nổi bật</td>
        <td>
          <select name="outstanding_effect" class="form-control" style="width: 400px;">
            <?php
            foreach($data['data'] as $item){
              echo "<option value='$item[oeid]'>$item[content]</option>";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Quy cách đóng gói</td>
        <td>
          <select name="packing_method" class="form-control" style="width: 150px;">
            <option value='1'>Lọ thuỷ tinh</option>
            <option value='2'>Gói to</option>
            <option value='3'>Gói nhỏ</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Số lượng</td>
        <td><input type="text" name="quantity" class="form-control" style="width: 90px;" /></td>
      </tr>
      <tr>
        <td>Giá</td>
        <td><input type="text" name="price" class="form-control" style="width: 90px; float: left;" /> <span style="float: left; padding: 7px;">đồng</span></td>
      </tr>
      <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="image" /></td>
      </tr>
      <tr>
        <td>Mô tả chi tiết</td>
        <td>
          <textarea rows="15" cols="70" class="form-control" style="resize: none;" name="description"></textarea>
        </td>
      </tr>
      <script type="text/javascript">
        CKEDITOR.replace('description');
      </script>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="Thêm sản phẩm mới" class="btn btn-primary" /></td>
      </tr>
    </table>
  </form>

  <div class="error">
    <?php
    if(!empty($data['error'])){
      echo "<ul>";
        foreach($data['error'] as $err){
          echo "<li>$err</li>";
        }
      echo "</ul>";
    }
    ?>
  </div>
</div>
<?php
loadview("layouts/footer");
?>
