<?php
loadview("layouts/header");
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#user_product_filter").change(function(){
      oeid = $("#user_product_filter").val();
      $("#products_filter form").attr("action", "index.php?controller=product&page=1&oeid="+oeid+"");
      $("#products_filter form").submit();
    });
  });
</script>

<div id="list_products_page" style="min-height: 252px;">
  <div id="products_filter">
    <form method="post">
      <span>Hiển thị sản phẩm theo công dụng nổi bật</span>
      <select class="form-control" style="width: 350px; float: left;" id="user_product_filter">
        <option value='0'>-- Tất cả --</option>
        <?php
        if (isset($_GET['oeid'])) {
          $choosen_oeid = $_GET['oeid'];
        } else {
          $choosen_oeid = 0;
        }
        foreach($data['effect'] as $item){
          if ($item['oeid'] == $choosen_oeid) {
            echo "<option value='$item[oeid]' selected='selected'>$item[content]</option>";
          } else {
            echo "<option value='$item[oeid]'>$item[content]</option>";
          }
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

  <div class="clr"></div>

  <nav aria-label="Page navigation" style="position: relative; height: 77px;">
    <ul class="pagination" style="position: absolute; right: 0px; bottom: 0px;">
      <?php
      if ($data['current_page'] == 1) {
        echo "<li class='disabled'>";
            echo "<span aria-hidden='true'>&laquo;</span>";
        echo "</li>";
      } else {
        $prev = $data['current_page'] - 1;
        echo "<li>";
          if(isset($_GET['oeid'])) {
            echo "<a href='index.php?controller=product&page=$prev&oeid=$choosen_oeid' aria-label='Previous'>";
          } else {
            echo "<a href='index.php?controller=product&page=$prev' aria-label='Previous'>";
          }
            echo "<span aria-hidden='true'>&laquo;</span>";
          echo "</a>";
        echo "</li>";
      }

      for ($i = 1; $i <= $data['page']; $i++) {
        if ($i == $data['current_page']) {
          echo "<li class='active'><a href='javascript: void(0)'>$i</a></li>";
        } else {
          if(isset($_GET['oeid'])) {
            echo "<li><a href='index.php?controller=product&page=$i&oeid=$choosen_oeid'>$i</a></li>";
          } else {
            echo "<li><a href='index.php?controller=product&page=$i'>$i</a></li>";
          }
        }
      }

      if ($data['current_page'] == $data['page']) {
        echo "<li class='disabled'>";
            echo "<span aria-hidden='true'>&raquo;</span>";
        echo "</li>";
      } else {
        $next = $data['current_page'] + 1;
        echo "<li>";
          if(isset($_GET['oeid'])) {
            echo "<a href='index.php?controller=product&page=$next&oeid=$choosen_oeid' aria-label='Next'>";
          } else {
            echo "<a href='index.php?controller=product&page=$next' aria-label='Next'>";
          }
            echo "<span aria-hidden='true'>&raquo;</span>";
          echo "</a>";
        echo "</li>";
      }
      ?>
    </ul>
  </nav>
</div>
<?php
loadview("layouts/footer");
?>
