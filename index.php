<?php
session_start();
define("BASEPATH", "http://localhost/www/herbal_tea/");
require("assets/config/database.php");
require("assets/config/function.php");

if (isset($_SESSION['level']) && ($_SESSION['level'] == 1)) {
  if ($_SESSION['total'] > 0) {
    $minvoice = new Model_Invoice;
    $minvoice->where(array("uid =" => $_SESSION['uid'], "status =" => "1"));
    $minvoice->select("total");
    $current_total = $minvoice->getTotal();
    $_SESSION['total'] = $current_total['total'];
  }
}

if(isset($_GET['controller'])){
  switch($_GET['controller']){
    case "static_page": require("controllers/static_page.php"); break;
    case "user": require("controllers/user/user.php"); break;
    case "session": require("controllers/session/session.php"); break;
    case "admin": require("controllers/admin/admin.php"); break;
    case "salesmanager": require("controllers/salesmanager/salesmanager.php"); break;
    case "product": require("controllers/product/product.php"); break;
    case "cart": require("controllers/cart/cart.php"); break;
    case "news": require("controllers/news/news.php"); break;
    case "ask_and_answer": require("controllers/ask_and_answer/ask_and_answer.php"); break;
  }
}else{
  if(isset($_SESSION['level']) && ($_SESSION['level'] == 2)){
    redirect("index.php?controller=salesmanager");
  }elseif(isset($_SESSION['level']) && ($_SESSION['level'] == 3)){
    redirect("index.php?controller=admin");
  }else{
    $mproduct = new Model_Product;

    $mproduct->order("pid", "DESC");
    $mproduct->limit("12");
    $data['main_right'] = $mproduct->listProduct();

    $mproduct->order("sold", "DESC");
    $mproduct->where("sold > '0'");
    $mproduct->limit("6");
    $data['main_left'] = $mproduct->listProduct();

    $mnews = new Model_News;
    $mnews->order("nid", "DESC");
    $mnews->limit("3");
    $data['news'] = $mnews->listNews();

    loadview("static_pages/home", $data);
  }
}
