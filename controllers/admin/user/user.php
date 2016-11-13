<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "index": require("controllers/admin/user/index.php"); break;
    case "destroy": require("controllers/admin/user/destroy.php"); break;
    case "edit": require("controllers/admin/user/edit.php"); break;
    case "index_ajax": require("controllers/admin/user/index_ajax.php"); break;
  }
}else{
  require("controllers/admin/user/index.php");
}

