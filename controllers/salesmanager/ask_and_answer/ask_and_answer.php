<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "answer": require("controllers/salesmanager/ask_and_answer/answer.php"); break;
  }
}else{
  require("controllers/salesmanager/ask_and_answer/index.php");
}
