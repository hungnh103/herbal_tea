<?php
$current_page = $_GET['page'];
$muser = new Model_User;
$maddressregister = new Model_AddressRegister;

if (isset($_GET['uid'])) {
  $uid = $_GET['uid'];
  $muser->deleteUser($uid);
  $maddressregister->deletedeleteAddressRegisterByUid($uid);
} else {
  $data = $_GET['data'];
  $data = json_decode($data, true);
  foreach ($data as $item) {
    $muser->deleteUser($item);
    $maddressregister->deletedeleteAddressRegisterByUid($item);
  }
}

redirect("http://localhost/www/herbal_tea/index.php?controller=admin&resources=user&page=$current_page");
