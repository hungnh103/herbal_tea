<?php
if(isset($_SESSION['level'])){
  $minvoicedetail = new Model_InvoiceDetail;
  $minvoicedetail->order("idid", "DESC");
  $data['detail'] = $minvoicedetail->listInvoiceDetail($_SESSION['iid']);
}else{
  $data = "";
}
loadview("cart/show", $data);
