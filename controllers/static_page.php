<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    // case "home": require("views/static_pages/home.php"); break;
    case "home": loadview("static_pages/home"); break;
    // case "guide": require("views/static_pages/guide.php"); break;
    case "guide": loadview("static_pages/guide"); break;
    // case "intro": require("views/static_pages/intro.php"); break;
    case "intro": loadview("static_pages/intro"); break;
  }
}else{

}
