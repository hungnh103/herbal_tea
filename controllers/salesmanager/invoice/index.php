<?php
$data = "";
$minvoice = new Model_Invoice;
$minvoice->order("iid", "DESC");
$data = $minvoice->listInvoice();
loadview("salesmanager/invoice/index", $data);
