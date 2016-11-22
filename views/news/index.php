<?php
loadview("layouts/header");
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#list_news div:last-child").css("border-bottom", "none");
  });
</script>

<div id="list_news">
  <?php
  if (empty($data)) {
    echo "<p>Chưa có bài viết nào</p>";
  } else {
    foreach ($data as $item) {
      echo "<div class='news_item'>";
        echo "<div class='poster'>";
          echo "<a href='index.php?controller=news&action=show&nid=$item[nid]'><img src='assets/images/news/$item[poster]' style='width: 210px; height: 100px;'></a>";
        echo "</div>";
        echo "<div class='news_abstract_info'>";
          echo "<a href='index.php?controller=news&action=show&nid=$item[nid]'><h2 style='margin: 0 0 3px 0; font-size: 16pt;'>$item[title]</h2></a>";
          $timestamp = strtotime($item['created_at']);
          echo "<p>Đăng ngày ".date("d/m/Y", $timestamp)."</p>";
        echo "</div>";
        echo "<div class='clr'></div>";
      echo "</div>";
    }
  }
  ?>

</div>

<?php
loadview("layouts/footer");
?>
