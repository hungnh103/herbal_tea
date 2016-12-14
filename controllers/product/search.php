<?php
$data = "";

if(isset($_POST['ok'])) {
  if (!empty($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $mproduct = new Model_Product;
    $data['products'] = $mproduct->searchProduct($keyword);
  } else {
    redirect("index.php");
  }
}

$data['keyword'] = $keyword;
$data['title_tag'] = "Kết quả tìm kiếm với từ khoá '$keyword'";
loadview("product/search", $data);
