<?php
$uid = $_GET['uid'];
$current_page = $_GET['page'];
$muser = new Model_User;
$muser->deleteUser($uid);
redirect("http://localhost/www/herbal_tea/index.php?controller=admin&resources=user&page=$current_page");
