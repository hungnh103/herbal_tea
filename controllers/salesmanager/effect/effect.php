<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "index": require("controllers/salesmanager/effect/index.php"); break;
    case "new": require("controllers/salesmanager/effect/new.php"); break;
    case "destroy": require("controllers/salesmanager/effect/destroy.php"); break;
    case "edit": require("controllers/salesmanager/effect/edit.php"); break;
  }
}else{
  require("controllers/salesmanager/effect/index.php");
}
