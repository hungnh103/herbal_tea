<?php
$per_page = 7;
$muser = new Model_User;
$muser->listUser();
$users_amount = $muser->num_rows();
$data['page'] = ceil($users_amount / $per_page);

$muser->order("uid", "DESC");
if (isset($_GET['page'])) {
  $data['current_page'] = $_GET['page'];
  $start = $per_page * ($data['current_page'] - 1);
  $muser->limit($per_page, $start);
} else {
  $muser->limit($per_page);
  $data['current_page'] = 1;
}
$data['user'] = $muser->listUser();

loadview("admin/user/index", $data);
