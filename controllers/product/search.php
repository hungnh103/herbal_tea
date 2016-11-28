<?php
$data = "";

if(isset($_POST['ok'])) {
  if (!empty($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $mproduct = new Model_Product;
    $data = $mproduct->searchProduct($keyword);
  } else {
    redirect("index.php");
  }
}

loadview("product/search", $data);
