<?php
$remid = $_GET['remid'];
$mremark = new Model_Remark;
$mremark->where("remid = '$remid'");
$update_data = array("is_approved" => "2");
$mremark->updateRemark($update_data);
redirect("index.php?controller=salesmanager&resources=remark&action=index");
