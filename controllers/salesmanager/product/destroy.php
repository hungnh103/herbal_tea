<?php
$pid = $_GET['pid'];
$mproduct = new Model_Product;
$mproduct->deleteProduct($pid);
redirect("index.php?controller=salesmanager&resources=product&action=index");
