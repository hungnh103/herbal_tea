<?php
$data = "";
$meffect = new Model_Effect;
$meffect->select("oeid, content");
$data['data'] = $meffect->listEffect();
if(isset($_POST['ok'])){
  $name = $price = $description = $outstanding_effect = $packing_method = $quantity = $image = "";
  if(empty($_POST['txtname'])){
    $data['error'][] = "Chưa nhập TÊN";
  }else{
    $name = $_POST['txtname'];
  }

  if(empty($_POST['quantity'])){
    $data['error'][] = "Chưa nhập SỐ LƯỢNG";
  }else{
    $quantity = $_POST['quantity'];
  }

  if(empty($_POST['price'])){
    $data['error'][] = "Chưa nhập GIÁ";
  }else{
    $price = $_POST['price'];
  }

  if(empty($_POST['description'])){
    $data['error'][] = "Chưa nhập MÔ TẢ CHI TIẾT";
  }else{
    $description = $_POST['description'];
  }

  $outstanding_effect = $_POST['outstanding_effect'];
  $packing_method = $_POST['packing_method'];

  if(empty($_FILES['image']['name'])){
    $image = "none";
  }else{
    $image = $_FILES['image']['name'];
  }

  if($name && $price && $description && $outstanding_effect && $packing_method && $quantity && $image){
    $mproduct = new Model_Product;
    $mproduct->where("name = '$name'");
    $mproduct->select("name");
    if($mproduct->checkProduct() == true){
      $input_data = array(
                      "name" => $name,
                      "price" => $price,
                      "quantity" => $quantity,
                      "packing_method" => $packing_method,
                      "description" => $description,
                      "oeid" => $outstanding_effect
                    );
      if($image != "none"){
        $input_data['image'] = $image;
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/products/".$_FILES['image']['name']);
      }
      $meffect->updateAmount($outstanding_effect, $quantity);
      $mproduct->addProduct($input_data);
      redirect("index.php?controller=salesmanager&resources=product&action=index");
    }else{
      $data['error'][] = "Kho hàng ĐÃ CÓ sản phẩm này";
    }

  }
}

$data['title_tag'] = "Thêm sản phẩm";
loadview("salesmanager/product/new", $data);
