<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "index": require("controllers/salesmanager/invoice/index.php"); break;
    case "show": require("controllers/salesmanager/invoice/show.php"); break;
    case "edit": require("controllers/salesmanager/invoice/edit.php"); break;
  }
}else{
  require("controllers/salesmanager/invoice/index.php");
}
