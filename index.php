<?php
session_start();
require("assets/config/function.php");
if(isset($_GET['controller'])){
  switch($_GET['controller']){
    case "static_page": require("controllers/static_page.php"); break;
    case "session": require("controllers/session/session.php"); break;
    case "admin/user": require("controllers/admin/user/user.php"); break;
  }
}else{
  loadview("static_pages/home");
}
