<?php
loadview("layouts/header");
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
                  echo "<a href='index.php?controller=cart&action=destroy_product&idid=$item[idid]' onclick='return check_delete_product();'><span class='icon_delete'>Xoá</span></a>";
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
                    echo "<input type='text' name='quantity' value='$item[quantity]' onchange='this.form.submit();' class='form-control' style='width: 60px; float: left;' />";
                    echo "<input type='submit' value='' class='pop_product' />";
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
      echo "<a href='index.php?controller=cart&action=shipping' class='btn btn-danger'>TIẾN HÀNH ĐẶT HÀNG</a>";
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
