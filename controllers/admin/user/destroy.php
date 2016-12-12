<?php
$current_page = $_GET['page'];
$muser = new Model_User;

if (isset($_GET['uid'])) {
  $uid = $_GET['uid'];
  $muser->deleteUser($uid);
} else {
  $data = $_GET['data'];
  $data = json_decode($data, true);
  $muser = new Model_User;
  foreach ($data as $item) {
    $muser->deleteUser($item);
  }
}

redirect("http://localhost/www/herbal_tea/index.php?controller=admin&resources=user&page=$current_page");
