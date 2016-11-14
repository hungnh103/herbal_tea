<?php
$mproduct = new Model_Product;
$mproduct->order("pid", "DESC");
$data = $mproduct->listProduct();
loadview("salesmanager/product/index", $data);
