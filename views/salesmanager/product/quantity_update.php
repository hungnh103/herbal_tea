<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#increase_product").keyup(function(){
      if($(this).val() != ""){
        $("#decrease_product").attr("disabled", "disabled");
      }else{
        $("#decrease_product").removeAttr("disabled");
      }
    });

    $("#decrease_product").keyup(function(){
      if($(this).val() != ""){
        $("#increase_product").attr("disabled", "disabled");
      }else{
        $("#increase_product").removeAttr("disabled");
      }
    });

  });
</script>

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
        <td>Bạn muốn thêm</td>
        <td><input type="text" name="add_quantity" class="form-control" id="increase_product" /> <span>sản phẩm</span></td>
      </tr>
      <tr>
        <td>hoặc bớt</td>
        <td><input type="text" name="subtract_quantity" class="form-control" id="decrease_product" /> <span>sản phẩm</span></td>
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
