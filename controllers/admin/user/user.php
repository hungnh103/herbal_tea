<?php
if(isset($_SESSION['level']) && $_SESSION['level'] == 3){
  if(isset($_GET['action'])){
    switch($_GET['action']){
      case "index": require("controllers/admin/user/index.php"); break;
    }
  }else{
    require("controllers/admin/user/index.php");
  }
}else{
  redirect("http://localhost/www/herbal_tea/");
}

