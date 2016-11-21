<?php
$data = "";
$iid = $_GET['iid'];
$minvoice = new Model_Invoice;
$data['invoice'] = $minvoice->getInvoiceByIid($iid);

$minvoicedetail = new Model_InvoiceDetail;
$minvoicedetail->order("idid", "DESC");
$minvoicedetail->select("name, price, quantity");
$data['invoice_detail'] = $minvoicedetail->listInvoiceDetail($iid);

$maddressregister = new Model_AddressRegister;
$data['addr'] = $maddressregister->getAddressRegisterById($data['invoice']['addrid']);

$mcommune = new Model_Commune;
$data['comm_info'] = $mcommune->getCommuneById($data['addr']['commid']);
$data['addr']['comm_name'] = $data['comm_info']['name'];

$mdistrict = new Model_District;
$data['dist_info'] = $mdistrict->getDistrictById($data['comm_info']['distid']);
$data['addr']['dist_name'] = $data['dist_info']['name'];

$mprovince = new Model_Province;
$data['prov_info'] = $mprovince->getProvinceById($data['dist_info']['provid']);
$data['addr']['prov_name'] = $data['prov_info']['name'];

loadview("salesmanager/invoice/show", $data);
