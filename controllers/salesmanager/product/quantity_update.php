<?php
$pid = $_GET['pid'];
$mproduct = new Model_Product;
$mproduct->select("pid, name, quantity");
$data['data'] = $mproduct->getProductById($pid);

if(isset($_POST['ok'])){
  $quantity = "";
  if(empty($_POST['quantity'])){
    $data['error'][] = "Chưa nhập số lượng mới";
  }else{
    $quantity = $_POST['quantity'];
  }

  if($quantity){
    $input_data = array("quantity" => $quantity);
    $mproduct->where("pid = '$pid'");
    $mproduct->updateProduct($input_data);
    redirect("index.php?controller=salesmanager&resources=product&action=index");
  }
}

loadview("salesmanager/product/quantity_update", $data);
