<?php
$data = "";

$muser = new Model_User;
$muser->select("uid");
$data['user']['all'] = $muser->countUser();
$muser->where("level = '1'");
$data['user']['member'] = $muser->countUser();
$muser->where("level = '2'");
$data['user']['salesmanager'] = $muser->countUser();
$muser->where("level = '3'");
$data['user']['admin'] = $muser->countUser();

$mproduct = new Model_Product;
$mproduct->select('pid');
$data['product']['types_amount'] = $mproduct->countProductsType();
$mproduct->select('sum(quantity)');
$data['product']['is_present_amount'] = $mproduct->statProduct();
$mproduct->select('sum(sold)');
$data['product']['sold_amount'] = $mproduct->statProduct();

$minvoice = new Model_Invoice;
$minvoice->where("status = '4'");
$minvoice->select("sum(total)");
$data['avenue']['total'] = $minvoice->statInvoice();
$data['avenue']['current_month_total'] = $minvoice->currentMonthTotal();

loadview("salesmanager/mainpage", $data);
