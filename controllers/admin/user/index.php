<?php
$muser = new Model_User;
$muser->order("uid", "DESC");
$data = $muser->listUser();
loadview("admin/user/index", $data);
