<?php
$idid = $_GET['idid'];
$new_quantity = $_POST['quantity'];

$minvoicedetail = new Model_InvoiceDetail;
$minvoicedetail->select("price, quantity, iid");
$current_product = $minvoicedetail->getInvoiceDetailById($idid);
$changed_amount = $new_quantity - $current_product['quantity'];

// cap nhat chi tiet hoa don
$detail_update = array("quantity" => $new_quantity);
$minvoicedetail->updateInvoiceDetail($detail_update);

// cap nhat hoa don
$minvoice = new Model_Invoice;
$_SESSION['products_amount'] += $changed_amount;
$_SESSION['total'] += $changed_amount * $current_product['price'];
$invoice_update = array(
                    "products_amount" => $_SESSION['products_amount'],
                    "total" => $_SESSION['total']
                  );
$minvoice->where("iid = '$current_product[iid]'");
$minvoice->updateInvoice($invoice_update);

redirect("index.php?controller=cart");
