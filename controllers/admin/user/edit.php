<?php
$uid = $_GET['uid'];
$level = $_GET['level'];
$current_page = $_GET['page'];
$muser = new Model_User;
$muser->where("uid = '$uid'");
if($level == 1){
  $data = array("level" => "2");
}else{
  $data = array("level" => "1");
}
$muser->updateUser($data);
redirect("admin/user/$current_page");
