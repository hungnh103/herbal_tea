<?php
$remid = $_GET['remid'];
$mremark = new Model_Remark;
$mremark->where("remid = '$remid'");
$update_data = array("is_approved" => "1");
$mremark->updateRemark($update_data);
$mremark->select("rating, pid");
$remark_info = $mremark->getRemarkByRemid($remid);

$mproduct = new Model_Product;
$mproduct->updateAfterAcceptRemark($remark_info['pid'], $remark_info['rating']);

redirect("index.php?controller=salesmanager&resources=remark&action=index");
