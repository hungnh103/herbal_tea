<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "show": require("controllers/cart/show.php");
    case "add_product": require("controllers/cart/add_product.php"); break;
    case "destroy_product": require("controllers/cart/destroy_product.php"); break;
    case "edit": require("controllers/cart/edit.php"); break;
    case "shipping": require("controllers/cart/shipping.php"); break;
    case "payment": require("controllers/cart/payment.php"); break;
    case "order": require("controllers/cart/order.php"); break;
  }
}else{
  require("controllers/cart/show.php");
}
