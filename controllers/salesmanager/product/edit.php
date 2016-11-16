<?php
$pid = $_GET['pid'];
$data = "";
$mproduct = new Model_Product;
$meffect = new Model_Effect;
$meffect->select("oeid, content");
$data['effect'] = $meffect->listEffect();

$data['product'] = $mproduct->getProductById($pid);

if(isset($_POST['ok'])){
  $name = $outstanding_effect = $packing_method = $price = $image = $description = "";
  if(empty($_POST['txtname'])){
    $data['error'][] = "Vui lòng không xoá TÊN";
  }else{
    $name = $_POST['txtname'];
  }

  $outstanding_effect = $_POST['outstanding_effect'];
  $packing_method = $_POST['packing_method'];

  if(empty($_POST['price'])){
    $data['error'][] = "Vui lòng không xoá GIÁ";
  }else{
    $price = $_POST['price'];
  }

  if(!empty($_FILES['image']['name'])){
    $image = $_FILES['image']['name'];
  }else{
    $image = "none";
  }

  if(empty($_POST['description'])){
    $data['error'][] = "Vui lòng không xoá MÔ TẢ CHI TIẾT";
  }else{
    $description = $_POST['description'];
  }

  if($name && $outstanding_effect && $packing_method && $price && $image && $description){
    $check_data = array(
                    "name =" => $name,
                    "pid <>" => $pid
                  );
    $mproduct->select("pid");
    if($mproduct->checkProduct($check_data) == true){
      $input_data = array(
                      "name" => $name,
                      "packing_method" => $packing_method,
                      "price" => $price,
                      "description" => $description
                    );
      if($image != "none"){
        $input_data['image'] = $image;
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/products/".$_FILES['image']['name']);
      }

      if($outstanding_effect != $data['product']['oeid']){
        $input_data['oeid'] = $outstanding_effect;
        $meffect->changeAmountWhenEditProduct($data['product']['oeid'], $data['product']['quantity'], $outstanding_effect);
      }
      $mproduct->where("pid = '$pid'");
      $mproduct->updateProduct($input_data);
      redirect("index.php?controller=salesmanager&resources=product&action=index");
    }else{
      $data['error'][] = "TRÙNG TÊN với sản phẩm khác";
    }
  }
}

loadview("salesmanager/product/edit", $data);
