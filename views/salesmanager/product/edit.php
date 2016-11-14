<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<div id="add_edit_product_interface">
  <form action="index.php?controller=salesmanager&resources=product&action=edit&pid=<?php echo $data['product']['pid']; ?>" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="txtname" class="form-control" style="width: 300px;" value="<?php echo $data['product']['name']; ?>" /></td>
      </tr>
      <tr>
        <td>Công dụng nổi bật</td>
        <td>
          <select name="outstanding_effect" class="form-control" style="width: 150px;">
            <?php
            foreach($data['effect'] as $item){
              if($data['product']['oeid'] == $item['oeid']){
                echo "<option value='$item[oeid]' selected='selected'>$item[content]</option>";
              }else{
                echo "<option value='$item[oeid]'>$item[content]</option>";
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Quy cách đóng gói</td>
        <td>
          <select name="packing_method" class="form-control" style="width: 150px;">
            <option value='1' <?php if($data['product']['packing_method'] == 1) echo "selected='selected'"; ?>>Lọ thuỷ tinh</option>
            <option value='2' <?php if($data['product']['packing_method'] == 2) echo "selected='selected'"; ?>>Gói to</option>
            <option value='3' <?php if($data['product']['packing_method'] == 3) echo "selected='selected'"; ?>>Gói nhỏ</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Giá</td>
        <td><input type="text" name="price" class="form-control" style="width: 90px; float: left;" value="<?php echo $data['product']['price']; ?>" /> <span style="float: left; padding: 7px;">đồng</span></td>
      </tr>
      <tr>
        <td>Hình ảnh</td>
        <td>
          <img src="assets/images/products/<?php echo $data['product']['image']; ?>" style="width: 400px; height: 300px;">
        </td>
      </tr>
      <tr>
        <td>Chọn ảnh khác</td>
        <td><input type="file" name="image" /></td>
      </tr>
      <tr>
        <td>Mô tả chi tiết</td>
        <td>
          <textarea rows="15" cols="70" class="form-control" style="resize: none;" name="description"><?php echo $data['product']['description']; ?></textarea>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="Cập nhật thông tin sản phẩm" class="btn btn-primary" /></td>
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
