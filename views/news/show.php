<?php
loadview("layouts/header");
?>

<div id="show_news">
  <?php
  echo "<h1 style='font-size: 20pt;'>$data[title]</h1>";
  $timestamp = strtotime($data['created_at']);
  echo "<p>Đăng ngày ".date("d/m/Y", $timestamp)."</p>";
  echo "<div id='news_content'>";
    echo $data['content'];
  echo "</div>";
  ?>

</div>

<?php
loadview("layouts/footer");
?>
