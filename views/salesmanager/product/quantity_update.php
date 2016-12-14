<?php
loadview("layouts/simple_header", $data);
loadview("salesmanager/nav_bar");
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#increase_product").keyup(function(){
      if($(this).val() != ""){
        $("#decrease_product").attr("disabled", "disabled");
      }else{
        if ($("#update_quantity_current_amount").val() > 0)
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

    $("input[type='submit']").click(function(){
      var pattern = /^[0-9]+$/;
      if ($("#increase_product").val() != "") {
        var change_amount = $("#increase_product").val();
        if ((pattern.test(change_amount) == false) || (change_amount == 0)) {
          alert("Số lượng nhập vào không hợp lệ");
          $("#increase_product").val("");
          $("#decrease_product").removeAttr("disabled");
          return false;
        }
      } else {
        var change_amount = $("#decrease_product").val();
        if ((pattern.test(change_amount) == false) || (change_amount == 0)) {
          alert("Số lượng nhập vào không hợp lệ");
          $("#decrease_product").val("");
          $("#increase_product").removeAttr("disabled");
          return false;
        } else {
          if (parseInt(change_amount) > parseInt($("#update_quantity_current_amount").val())) {
            alert("Số lượng bớt đi không được lớn hơn số lượng hiện có");
            return false;
          }
        }
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
  <?php
  echo "<form action='index.php?controller=salesmanager&resources=product&action=quantity_update&pid=".$data['data']['pid']."&page=$data[current_page]' method='post'>";
  ?>
  <form action="index.php?controller=salesmanager&resources=product&action=quantity_update&pid=<?php echo $data['data']['pid']; ?>&page=<?php  ?>" method="post">
    <table>
      <tr>
        <td>Tên sản phẩm</td>
        <td style="color: brown; font-weight: bold;"><?php echo $data['data']['name']; ?></td>
      </tr>
      <tr>
        <td>Số lượng hiện có</td>
        <td style="color: brown; font-weight: bold;"><?php echo number_format($data['data']['quantity']); ?></td>
        <?php
        echo "<input type='hidden' id='update_quantity_current_amount' value='".$data['data']['quantity']."'>";
        ?>
      </tr>
      <tr>
        <td>Bạn muốn thêm</td>
        <td><input type="text" name="add_quantity" class="form-control" id="increase_product" /> <span>sản phẩm</span></td>
      </tr>
      <tr>
        <td>hoặc bớt</td>
        <td><input type="text" name="subtract_quantity" class="form-control" id="decrease_product" <?php if ($data['data']['quantity'] == 0) echo "disabled='disabled'"; ?> /> <span>sản phẩm</span></td>
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
