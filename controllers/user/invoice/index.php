<?php
$data = "";
$minvoice = new Model_Invoice;
$minvoice->select("iid, products_amount, total, order_date, status");
$minvoice->order("iid", "DESC");
$data = $minvoice->getInvoiceByUid($_SESSION['uid']);
loadview("user/invoice/index", $data);
