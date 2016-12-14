<?php
$data = "";
$addrid = $_GET['addrid'];

$maddressregister = new Model_AddressRegister;
$data['addr'] = $maddressregister->getAddressRegisterById($addrid);

$mcommune = new Model_Commune;
$comm_info = $mcommune->getCommuneById($data['addr']['commid']);
$data['addr']['distid'] = $comm_info['distid'];
$data['commune'] = $mcommune->listCommuneByDistid($comm_info['distid']);

$mdistrict = new Model_District;
$dist_info = $mdistrict->getDistrictById($comm_info['distid']);
$data['addr']['provid'] = $dist_info['provid'];
$data['district'] = $mdistrict->listDistrictByProvid($dist_info['provid']);

$mprovince = new Model_Province;
$data['province'] = $mprovince->listProvince();

if(isset($_POST['ok'])) {
  $fullname = $telephone = $province = $district = $commune = $address = "";
  if(empty($_POST['fullname'])){
    $data['error'][] = "Họ tên không được để trống";
  }else{
    $fullname = $_POST['fullname'];
  }

  if(empty($_POST['telephone'])){
    $data['error'][] = "Số điện thoại không được để trống";
  }else{
    $telephone = $_POST['telephone'];
  }

  if($_POST['province'] == 0){
    $data['error'][] = "Chưa chọn tỉnh/thành";
  } else {
    $province = $_POST['province'];
  }

  if($_POST['district'] == 0){
    $data['error'][] = "Chưa chọn quận/huyện";
  } else {
    $district = $_POST['district'];
  }

  if($_POST['commune'] == 0){
    $data['error'][] = "Chưa chọn xã/phường";
  }else{
    $commune = $_POST['commune'];
  }

  if(empty($_POST['address'])){
    $data['error'][] = "Địa chỉ không được để trống";
  }else{
    $address = $_POST['address'];
  }

  if ($fullname && $telephone && $province && $district && $commune && $address) {
    $update_data = array(
                      "fullname" => $fullname,
                      "telephone"=> $telephone,
                      "address" => $address,
                      "commid" => $commune
                    );
    $maddressregister->updateAddressRegister($update_data);
    redirect("index.php?controller=user&uid=".$data['addr']['uid']."");
  }
}

$data['title_tag'] = "Chỉnh sửa địa chỉ";
loadview("user/address/new", $data);
