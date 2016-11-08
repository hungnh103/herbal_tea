<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "signup": require("controllers/user/signup.php"); break;
  }
}
