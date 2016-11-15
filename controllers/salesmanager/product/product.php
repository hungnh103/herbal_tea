<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "index": require("controllers/salesmanager/product/index.php"); break;
    case "new": require("controllers/salesmanager/product/new.php"); break;
    case "destroy": require("controllers/salesmanager/product/destroy.php"); break;
    case "edit": require("controllers/salesmanager/product/edit.php"); break;
    case "quantity_update": require("controllers/salesmanager/product/quantity_update.php"); break;
  }
}else{
  require("controllers/salesmanager/product/index.php");
}
