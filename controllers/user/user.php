<?php
if(isset($_GET['resources'])){
  switch($_GET['resources']){
    case "address": require("controllers/user/address/address.php"); break;
    case "invoice": require("controllers/user/invoice/invoice.php"); break;
  }
}else{
  if(isset($_GET['action'])){
    switch($_GET['action']){
      case "signup": require("controllers/user/signup.php"); break;
    }
  }else{
    require("controllers/user/account.php");
  }
}
