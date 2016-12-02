<?php
$pid = $_GET['pid'];
$mproduct = new Model_Product;
$mproduct->select("pid, name, quantity, oeid");
$data['data'] = $mproduct->getProductById($pid);
$data['current_page'] = $_GET['page'];

if(isset($_POST['ok'])){
  $quantity = $change = "";
  if(empty($_POST['add_quantity']) && empty($_POST['subtract_quantity'])){
    $data['error'][] = "Chưa nhập số lượng thay đổi";
  }else{
    if(empty($_POST['add_quantity'])){
      $quantity = $_POST['subtract_quantity'];
      $change = "down";
    }else{
      $quantity = $_POST['add_quantity'];
      $change = "up";
    }
  }

  if($quantity){
    $mproduct->updateProductAmount($pid, $quantity, $change);
    $meffect = new Model_Effect;
    $meffect->changeAmountWhenUpdateProductAmount($data['data']['oeid'], $quantity, $change);
    redirect("index.php?controller=salesmanager&resources=product&page=$data[current_page]");
  }
}

loadview("salesmanager/product/quantity_update", $data);
