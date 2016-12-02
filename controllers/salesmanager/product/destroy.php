<?php
$pid = $_GET['pid'];
$current_page = $_GET['page'];
$mproduct = new Model_Product;
$mproduct->deleteProduct($pid);
redirect("index.php?controller=salesmanager&resources=product&page=$current_page");
