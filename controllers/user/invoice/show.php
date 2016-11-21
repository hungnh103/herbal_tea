<?php
$data = "";
$data['addr'] = "";
$iid = $_GET['iid'];

$minvoice = new Model_Invoice;
$minvoice->select("products_amount, total, addrid");
$data['invoice'] = $minvoice->getInvoiceByIid($iid);
if ($data['invoice']['addrid'] != 0) {
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
}

$minvoicedetail = new Model_InvoiceDetail;
$minvoicedetail->select("name, price, quantity, pid");
$minvoicedetail->order("idid", "DESC");
$data['product'] = $minvoicedetail->listInvoiceDetail($iid);
loadview("user/invoice/show", $data);
