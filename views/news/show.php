<?php
loadview("layouts/header", $data);
?>

<div id="show_news" style="min-height: 252px;">
  <?php
  echo "<h1 style='font-size: 20pt;'>".$data['news']['title']."</h1>";
  $timestamp = strtotime($data['news']['created_at']);
  echo "<p>Đăng ngày ".date("d/m/Y", $timestamp)."</p>";
  echo "<div id='news_content'>";
    echo $data['news']['content'];
  echo "</div>";
  ?>

</div>

<?php
loadview("layouts/footer");
?>
