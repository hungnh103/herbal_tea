<?php
$pid = $_GET['pid'];
$mproduct = new Model_Product;
$data['product'] = $mproduct->getProductById($pid);
loadview("product/show", $data);
