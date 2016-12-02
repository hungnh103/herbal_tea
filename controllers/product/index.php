<?php
$meffect = new Model_Effect;
$meffect->order("oeid", "DESC");
$data['effect'] = $meffect->listEffect();

$per_page = 12;
$mproduct = new Model_Product;
if(isset($_GET['oeid']) && $_GET['oeid'] != 0) {
  $mproduct->where("oeid = '$_GET[oeid]'");
}
$mproduct->listProduct();
$data['items_amount'] = $mproduct->num_rows();
$data['page'] = ceil($data['items_amount'] / $per_page);
$mproduct->order("pid", "DESC");
if(isset($_GET['page'])) {
  $data['current_page'] = $_GET['page'];
  $start = $per_page * ($data['current_page'] - 1);
  $mproduct->limit($per_page, $start);
} else {
  $mproduct->limit($per_page);
  $data['current_page'] = 1;
}
$data['product'] = $mproduct->listProduct();

loadview("product/index", $data);
