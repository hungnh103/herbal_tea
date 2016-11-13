<?php
$uid = $_GET['uid'];
$muser = new Model_User;
$muser->deleteUser($uid);
redirect("http://localhost/www/herbal_tea/index.php?controller=admin&resources=user");
