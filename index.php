<?php
session_start();
require("assets/config/database.php");
require("assets/config/function.php");
if(isset($_GET['controller'])){
  switch($_GET['controller']){
    case "static_page": require("controllers/static_page.php"); break;
    case "user": require("controllers/user/user.php"); break;
    case "session": require("controllers/session/session.php"); break;
    case "admin": require("controllers/admin/admin.php"); break;
    case "salesmanager": require("controllers/salesmanager/salesmanager.php"); break;
  }
}else{
  $mproduct = new Model_Product;
  $mproduct->order("pid", "DESC");
  $mproduct->limit("12");
  $data['main_right'] = $mproduct->listProduct();
  $mproduct->order("sold, pid", "DESC");
  $mproduct->limit("6");
  $data['main_left'] = $mproduct->listProduct();
  loadview("static_pages/home", $data);
}
