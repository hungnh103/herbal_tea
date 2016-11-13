<?php
if(isset($_SESSION['level']) && ($_SESSION['level'] == 3)){
  if(isset($_GET['resources'])){
    switch($_GET['resources']){
      case "user": require("controllers/admin/user/user.php"); break;
    }
  }else{
    require("controllers/admin/user/index.php");
  }
}else{
  redirect("http://localhost/www/herbal_tea/");
}
