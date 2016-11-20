<?php
$maddressregister = new Model_AddressRegister;
$mcommune = new Model_Commune;
$mdistrict = new Model_District;
$mprovince = new Model_Province;
$data['addr'] = $maddressregister->listAddressRegisterByUid($_SESSION['uid']);
if($data['addr'] != "") {
  $i = 0;
  foreach ($data['addr'] as $item){
    $comm_info = $mcommune->getCommuneById($item['commid']);
    $data['addr'][$i]['comm_name'] = $comm_info['name'];
    $dist_info =  $mdistrict->getDistrictById($comm_info['distid']);
    $data['addr'][$i]['dist_name'] = $dist_info['name'];
    $prov_info = $mprovince->getProvinceById($dist_info['provid']);
    $data['addr'][$i]['prov_name'] = $prov_info['name'];

    $i++;
  }
}

loadview("cart/shipping", $data);
