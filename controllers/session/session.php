<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "new": require("controllers/session/new.php"); break;
    case "destroy": require("controllers/session/destroy.php"); break;
  }
}else{

}
