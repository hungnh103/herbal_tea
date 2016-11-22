<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "index": require("controllers/salesmanager/news/index.php"); break;
    case "new": require("controllers/salesmanager/news/new.php"); break;
    case "destroy": require("controllers/salesmanager/news/destroy.php"); break;
    case "edit": require("controllers/salesmanager/news/edit.php"); break;
  }
}else{
  require("controllers/salesmanager/news/index.php");
}
