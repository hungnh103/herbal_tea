<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<div id="update_product_quantity">
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
  <form action="index.php?controller=salesmanager&resources=product&action=quantity_update&pid=<?php echo $data['data']['pid']; ?>" method="post">
    <table>
      <tr>
        <td>Tên sản phẩm</td>
        <td style="color: brown; font-weight: bold;"><?php echo $data['data']['name']; ?></td>
      </tr>
      <tr>
        <td>Số lượng hiện có</td>
        <td style="color: brown; font-weight: bold;"><?php echo number_format($data['data']['quantity']); ?></td>
      </tr>
      <tr>
        <td>Số lượng mới</td>
        <td><input type="text" name="quantity" class="form-control" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="Cập nhật" class="btn btn-primary" /></td>
      </tr>
    </table>
  </form>
</div>
<?php
loadview("layouts/footer");
?>
