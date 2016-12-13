<?php
$data = "";
$mprovince = new Model_Province;
$data['province'] = $mprovince->listProvince();
if(isset($_POST['ok'])){
  $uid = $_GET['uid'];

  $fullname = $telephone = $commune = $address = "";
  if(empty($_POST['fullname'])){
    $data['error'][] = "Chưa nhập họ tên";
  }else{
    $fullname = $_POST['fullname'];
  }

  if(empty($_POST['telephone'])){
    $data['error'][] = "Chưa nhập số điện thoại";
  }else{
    $telephone = $_POST['telephone'];
  }

  if($_POST['province'] == 0){
    $data['error'][] = "Chưa chọn tỉnh/thành";
  }

  if($_POST['district'] == 0){
    $data['error'][] = "Chưa chọn quận/huyện";
  }

  if($_POST['commune'] == 0){
    $data['error'][] = "Chưa chọn xã/phường";
  }else{
    $commune = $_POST['commune'];
  }

  if(empty($_POST['address'])){
    $data['error'][] = "Chưa nhập địa chỉ";
  }else{
    $address = $_POST['address'];
  }

  if($fullname && $telephone && $commune && $address) {
    $input_data = array(
                    "fullname" => $fullname,
                    "telephone" => $telephone,
                    "address" => $address,
                    "commid" => $commune,
                    "uid" => $uid
                  );
    $maddressregister = new Model_AddressRegister;
    $maddressregister->addAddressRegister($input_data);
    redirect("index.php?controller=user&uid=$uid");
  }
}

$data['title_tag'] = "Tạo địa chỉ mới";
loadview("user/address/new", $data);
