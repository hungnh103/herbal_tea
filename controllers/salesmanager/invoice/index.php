<?php
$data = "";
$per_page = 10;
$minvoice = new Model_Invoice;
$minvoice->listInvoice();
$invoices_amount = $minvoice->num_rows();
$data['page'] = ceil($invoices_amount / $per_page);

$minvoice->order("iid", "DESC");
if (isset($_GET['page'])) {
  $data['current_page'] = $_GET['page'];
  $start = $per_page * ($data['current_page'] - 1);
  $minvoice->limit($per_page, $start);
} else {
  $minvoice->limit($per_page);
  $data['current_page'] = 1;
}

$data['invoice'] = $minvoice->listInvoice();

loadview("salesmanager/invoice/index", $data);
