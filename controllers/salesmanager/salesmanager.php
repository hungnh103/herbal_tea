<?php
if(isset($_SESSION['level']) && ($_SESSION['level'] == 2)){
  if(isset($_GET['resources'])){
    switch($_GET['resources']){
      case "product": require("controllers/salesmanager/product/product.php"); break;
      case "effect": require("controllers/salesmanager/effect/effect.php"); break;
      case "invoice": require("controllers/salesmanager/invoice/invoice.php"); break;
      case "request": require("controllers/salesmanager/request/request.php"); break;
      case "news": require("controllers/salesmanager/news/news.php"); break;
      case "ask_and_answer": require("controllers/salesmanager/ask_and_answer/ask_and_answer.php"); break;
      case "remark": require("controllers/salesmanager/remark/remark.php"); break;
    }
  }else{
    require("controllers/salesmanager/mainpage.php");
  }
}else{
  if(isset($_SESSION['level']) && ($_SESSION['level'] == 3)){
    redirect("http://localhost/www/herbal_tea/index.php?controller=admin");
  }else{
    redirect("http://localhost/www/herbal_tea/");
  }
}
