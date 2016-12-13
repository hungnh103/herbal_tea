<?php
$data = "";
$minvoice = new Model_Invoice;
$minvoice->select("iid, products_amount, total, order_date, status");
$minvoice->order("iid", "DESC");
$data['invoices'] = $minvoice->getInvoiceByUid($_SESSION['uid']);
$data['title_tag'] = "Danh sách đơn hàng thành viên";
loadview("user/invoice/index", $data);
