<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "index": require("controllers/salesmanager/remark/index.php"); break;
    case "accept": require("controllers/salesmanager/remark/accept.php"); break;
    case "cancel": require("controllers/salesmanager/remark/cancel.php"); break;
  }
}else{
  require("controllers/salesmanager/remark/index.php");
}
