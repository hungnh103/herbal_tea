<?php
loadview("layouts/header");
?>
<div id="list_products_page">
  <div id="products_filter">
    <form>
      <span>Hiển thị sản phẩm theo công dụng nổi bật</span>
      <select class="form-control" style="width: 200px; float: left;">
        <option value='0'>-- Tất cả --</option>
        <?php
        foreach($data['effect'] as $item){
          echo "<option value='$item[oeid]'>$item[content]</option>";
        }
        ?>
      </select>
    </form>
  </div>

  <div id="products_list">
    <?php
    if(empty($data['product'])){
      echo "<p style='margin: 10px; font-size: 12pt;'>Chưa có sản phẩm nào</p>";
    }else{
      foreach($data['product'] as $item){
        echo "<div class='product'>";
          echo "<a href='#'>";
            echo "<img src='assets/images/products/$item[image]' />";
            echo "<h2 class='product_name'>$item[name]</h2>";
            echo "<p class='product_price'>".number_format($item['price'])."₫</p>";
          echo "</a>";
        echo "</div>";
      }
    }
    ?>
  </div>
</div>
<?php
loadview("layouts/footer");
?>
