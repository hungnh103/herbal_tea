<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "home": loadview("static_pages/home"); break;
    case "guide": loadview("static_pages/guide"); break;
    case "intro": loadview("static_pages/intro"); break;
  }
}else{

}
