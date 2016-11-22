<?php
loadview("layouts/header");
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#slider .carousel-inner .item:first-child").addClass("active");
  });
</script>

<div id="info">
  <div id="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php
        if(empty($data['news'])) {
          // lam gi do
        } else {
          foreach ($data['news'] as $item) {
            echo "<div class='item'>";
              echo "<a href='index.php?controller=news&action=show&nid=$item[nid]'><img src='assets/images/news/$item[poster]' style='width: 630px; height: 300px;'></a>";
              echo "<div class='carousel-caption'>";
                echo "<h2>$item[title]</h2>";
              echo "</div>";
            echo "</div>";
          }
        }
        ?>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </div>
  <!-- SLIDER -->

  <div id="ads">
    <div id="up_ads">
      <a href=""><img src="assets/images/system/consult.png"></a>
    </div>
    <div id="down_ads">
      <p>Đăng ký nhận thông báo từ website</p>
      <form>
        <input type="text" placeholder="Email của bạn" class="form-control">
        <button class="btn btn-info">Đăng ký</button>
      </form>
    </div>
  </div>

</div>

<div class="clr"></div>

<div id="main">
  <div id="main_left">
    <h3>SẢN PHẨM BÁN CHẠY</h3>
    <ul style='border-top: 2px solid #FDD504;'>
      <?php
      if(empty($data['main_left'])){
        echo "<li style='font-size: 12pt;'>Chưa có sản phẩm nào</li>";
      }else{
        foreach($data['main_left'] as $item){
          echo "<li>";
            echo "<div class='thumbnail'>";
              echo "<a href='index.php?controller=product&action=show&pid=$item[pid]'><img src='assets/images/products/$item[image]'></a>";
            echo "</div>";
            echo "<div class='abstract_info'>";
              echo "<a href='index.php?controller=product&action=show&pid=$item[pid]'>$item[name]</a><span>new</span>";
              echo "<p></p>";
            echo "</div>";
          echo "</li>";
        }
      }
      ?>
    </ul>
  </div>

  <div id="main_right">
    <?php
    if(empty($data['main_right'])){
      echo "<p style='margin: 10px; font-size: 12pt;'>Chưa có sản phẩm nào</p>";
    }else{
      foreach($data['main_right'] as $item){
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
</div>

<?php
loadview("layouts/footer");
?>
