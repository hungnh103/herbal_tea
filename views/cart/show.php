<?php
loadview("layouts/header", $data);
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.push_product').click(function(){
      current_value = $(this).next('input[type=text]').val();
      $(this).next('input[type=text]').val(++current_value);
    });
    $('.pop_product').click(function(){
      current_value = $(this).prev('input[type=text]').val();
      $(this).prev('input[type=text]').val(--current_value);
    });
  });

  function check_delete_product(){
    if(!window.confirm('Bạn chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng?')) return false;
  }

  function change_text_amount(id) {
    var pattern = /^[0-9]+$/;
    var old_value = document.getElementById("hidden"+id).value;
    var new_value = document.getElementById(id).value;
    if (pattern.test(new_value) == false) {
      alert("Số lượng thay đổi không hợp lệ");
      document.getElementById(id).value = old_value;
      return false;
    } else {
      if (new_value == 0) {
        alert("Số lượng sản phẩm phải lớn hơn 0");
        document.getElementById(id).value = old_value;
        return false;
      } else {
        return true;
      }
    }
  }
</script>

<div id="my_cart" style="min-height: 252px;">
  <div id="pending_product">
    <span>
      <b>Giỏ hàng</b> (
        <?php
        if(isset($_SESSION['products_amount'])){
          echo number_format($_SESSION['products_amount']);
        }else{
          echo "0";
        }
        ?>
         sản phẩm)
    </span>

    <?php
    if(isset($_SESSION['level'])){
      if($_SESSION['products_amount'] > 0){
          echo "<table class='table'>";
            echo "<tr>";
              echo "<td class='first_row' style='width: 160px;'></td>";
              echo "<td class='first_row'></td>";
              echo "<td class='first_row' style='width: 150px;'>Giá mua</td>";
              echo "<td class='first_row' style='width: 140px;'>Số lượng</td>";
            echo "</tr>";

            foreach($data['detail'] as $item){
              echo "<tr>";
                echo "<td><img src='assets/images/products/$item[image]' /></td>";
                echo "<td class='name_and_delete'>";
                  echo "<h2><a href='index.php?controller=product&action=show&pid=$item[pid]'>$item[name]</a></h2>";
                  echo "<a href='index.php?controller=cart&action=destroy_product&idid=$item[idid]' onclick='return check_delete_product();'><span class='icon_delete'>Xoá</span></a><br>";
                  if ($item['check'] != -1) {
                    if ($item['check'] > 0) {
                      echo "<p style='color: #fff; background: brown; padding: 5px; margin-top: 10px; border-radius: 5px; display: inline-block;'>Chỉ còn $item[check] sản phẩm</p>";
                    } else {
                      echo "<p style='color: #fff; background: #B8860B; padding: 5px; margin-top: 10px; border-radius: 5px; display: inline-block;'>Hết hàng</p>";
                    }
                  }
                echo "</td>";
                echo "<td class='net_price'>".number_format($item['price'])." ₫</td>";
                echo "<td style='padding: 20px 0;'>";
                  echo "<form action='index.php?controller=cart&action=edit&idid=$item[idid]' method='post'>";
                  if($item['quantity'] < 10){
                    echo "<select class='form-control' name='quantity' onchange='this.form.submit();'>";
                      for($i = 1; $i < 10; $i++){
                        if($item['quantity'] == $i){
                          echo "<option value='$i' selected='selected'>$i</option>";
                        }else{
                          echo "<option value='$i'>$i</option>";
                        }
                      }
                      echo "<option value='10'>10+</option>";
                    echo "</select>";
                  }else{
                    echo "<input type='submit' value='' class='push_product' />";
                    echo "<input type='text' name='quantity' value='$item[quantity]' id='$item[idid]' onchange='if(change_text_amount($item[idid])) this.form.submit();' class='form-control' style='width: 60px; float: left;' />";
                    echo "<input type='submit' value='' class='pop_product' />";
                    echo "<input type='hidden' value='$item[quantity]' id='hidden".$item['idid']."'>";
                  }
                  echo "</form>";
                echo "</td>";
              echo "</tr>";
            }
          echo "</table>";
      }
    }
    ?>
  </div>

  <div id="make_order">
    <?php
    if(isset($_SESSION['level']) && ($_SESSION['products_amount'] > 0)){
      if ($_SESSION['is_remain'] == 0) {
        echo "<a href='index.php?controller=cart&action=shipping' class='btn btn-danger' >TIẾN HÀNH ĐẶT HÀNG</a>";
      } else {
        echo "<a href='javascript:void(0);' class='btn btn-danger' disabled >TIẾN HÀNH ĐẶT HÀNG</a>";
        echo "<p style='font-size:12pt; margin-top:10px;'>Giỏ hàng có <b>$_SESSION[is_remain]</b> loại sản phẩm không đủ số lượng đáp ứng</p>";
      }
    }
    ?>
  </div>

  <div class="clr"></div>

  <div id="continue_buying">
    <a href="index.php?controller=product" class="btn btn-default">Tiếp tục mua sắm</a>
  </div>
</div>
<?php
loadview("layouts/footer");
?>
