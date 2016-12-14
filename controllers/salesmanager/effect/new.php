<?php
$data = "";
if(isset($_POST['ok'])){
  $effect = "";
  if(empty($_POST['txteffect'])){
    $data['error'][] = "Vui lòng nhập tên công dụng mới";
  }else{
    $effect = $_POST['txteffect'];
  }

  if($effect){
    $meffect = new Model_Effect;
    $meffect->where("content = '$effect'");
    $meffect->select("content");
    if($meffect->checkEffect() == true){
      $input_data = array("content" => $effect);
      $meffect->addEffect($input_data);
      redirect("index.php?controller=salesmanager&resources=effect&action=index");
    }else{
      $data['error'][] = "Tên công dụng đã tồn tại, vui lòng chọn tên khác";
    }
  }
}

$data['title_tag'] = "Thêm công dụng mới";
loadview("salesmanager/effect/new", $data);
