<?php
if(isset($_GET['resource'])){

}else{
  if(isset($_GET['action'])){
    switch($_GET['action']){
      case "signup": require("controllers/user/signup.php"); break;
    }
  }else{
    require("controllers/user/account.php");
  }
}
