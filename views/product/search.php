<?php
loadview("layouts/header");
?>

<div id="search_result" style="width: 1000px; margin: auto; min-height: 257px;">
  <?php
  if($data == "") {
    echo "<p style='font-weight: bold; font-size: 14pt; margin: 10px 0 20px 0px;'>Không tìm thấy sản phẩm nào</p>";
    echo "<a href='index.php'>Quay lại trang chủ</a>";
  } else {
    $a = count($data);
    echo "<p style='font-weight: bold; font-size: 14pt; margin: 10px 0 20px 10px;'>Tìm thấy $a sản phẩm</p>";
    foreach ($data as $item) {
      echo "<div class='product'>";
        echo "<a href='index.php?controller=product&action=show&pid=$item[pid]'>";
          echo "<img src='assets/images/products/$item[image]' />";
          echo "<h2 class='product_name'>$item[name]</h2>";
          echo "<p class='product_price'>".number_format($item['price'])."₫</p>";
        echo "</a>";
      echo "</div>";
    }
  }
  ?>
</div>

<?php
loadview("layouts/footer");
?>
