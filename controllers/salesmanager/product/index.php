<?php
$per_page = 10;
$mproduct = new Model_Product;
$mproduct->listProduct();
$products_amount = $mproduct->num_rows();
$data['page'] = ceil($products_amount / $per_page);

$mproduct->order("pid", "DESC");
if (isset($_GET['page'])) {
  $data['current_page'] = $_GET['page'];
  $start = $per_page * ($data['current_page'] - 1);
  $mproduct->limit($per_page, $start);
} else {
  $mproduct->limit($per_page);
  $data['current_page'] = 1;
}

$data['product'] = $mproduct->listProduct();

loadview("salesmanager/product/index", $data);
