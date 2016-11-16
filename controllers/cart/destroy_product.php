<?php
$idid = $_GET['idid'];
$minvoicedetail = new Model_InvoiceDetail;
$minvoicedetail->select("price, quantity, iid");
$product_info = $minvoicedetail->getInvoiceDetailById($idid);
$_SESSION['products_amount'] -= $product_info['quantity'];
$_SESSION['total'] -= $product_info['price'] * $product_info['quantity'];
$minvoicedetail->deleteInvoiceDetail($idid);

$minvoice = new Model_Invoice;
if($_SESSION['total'] == 0){
  // neu total = 0, xoa hoa don
  $_SESSION['iid'] = 0;
  $minvoice->deleteInvoice($product_info['iid']);
}else{
  // cap nhat lai hoa don
  $minvoice->where("iid = '$product_info[iid]'");
  $invoice_update = array(
                      "products_amount" => $_SESSION['products_amount'],
                      "total" => $_SESSION['total']
                    );
  $minvoice->updateInvoice($invoice_update);
}

redirect("index.php?controller=cart");
