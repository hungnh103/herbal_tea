<?php
$oeid = $_GET['oeid'];
$meffect = new Model_Effect;
$meffect->select("oeid, content");

if(isset($_POST['ok'])){
  $effect = "";
  if(empty($_POST['txteffect'])){
    $data['error'][] = "Tên công dụng không được để trống";
  }else{
    $effect = $_POST['txteffect'];
  }

  if($effect){
    $check_data = array(
              "oeid <>" => $oeid,
              "content =" => $effect
            );
    $meffect->select("oeid, content");
    if($meffect->checkEffect($check_data) == true){
      $meffect->where("oeid = '$oeid'");
      $update_data = array("content" => $effect);
      $meffect->updateEffect($update_data);
      redirect("index.php?controller=salesmanager&resources=effect&action=index");
    }else{
      $data['error'][] = "Tên công dụng đã tồn tại, vui lòng chọn tên khác";
    }
  }
}
$data['data'] = $meffect->getEffectById($oeid);
loadview("salesmanager/effect/edit", $data);
