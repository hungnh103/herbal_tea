<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "index": require("controllers/product/index.php"); break;
    case "show": require("controllers/product/show.php"); break;
    case "search": require("controllers/product/search.php"); break;
  }
}else{
  require("controllers/product/index.php");
}
