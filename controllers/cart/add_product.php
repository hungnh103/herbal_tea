<?php
if(isset($_POST['ok'])){
  $uid = $_POST['uid'];
  $pid = $_POST['pid'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $image = $_POST['image'];

  $subtotal = $price * $quantity;
  $_SESSION['products_amount'] += $quantity;
  $_SESSION['total'] += $subtotal;

  $minvoice = new Model_Invoice;
  $minvoicedetail = new Model_InvoiceDetail;

  if($_SESSION['iid'] > 0){
    // cap nhat gio hang
    $minvoice->where("iid = '$_SESSION[iid]'");
    $invoice_update_data = array(
                              "products_amount" => $_SESSION['products_amount'],
                              "total" => $_SESSION['total']
                            );
    $minvoice->updateInvoice($invoice_update_data);

    $check_result = $minvoicedetail->checkProductExistence($_SESSION[iid], $pid);
    if(is_array($check_result)){
      // da co san pham trong gio hang, cap nhat
      $minvoicedetail->where("idid = '$check_result[idid]'");
      $check_result['quantity'] += $quantity;
      $detail_update_data = array("quantity" => $check_result['quantity']);
      $minvoicedetail->updateInvoiceDetail($detail_update_data);
    }else{
      // chua co san pham trong gio hang, them moi
      $detail_input_data = array(
                              "name" => $name,
                              "price" => $price,
                              "quantity" => $quantity,
                              "image" => $image,
                              "iid" => $_SESSION['iid'],
                              "pid" => $pid
                            );
      $minvoicedetail->addInvoiceDetail($detail_input_data);
    }
  }else{
    // tao gio hang moi
    $invoice_input_data = array(
                            "products_amount" => $quantity,
                            "total" => $subtotal,
                            "uid" => $uid,
                          );
    $minvoice->addInvoice($invoice_input_data);
    $invoice_abstract = array(
                          "status =" => "1",
                          "uid =" => $uid
                        );
    $_SESSION['iid'] = $minvoice->getInvoiceId($invoice_abstract);
    // them san pham vao gio hang moi tao
    $detail_input_data = array(
                            "name" => $name,
                            "price" => $price,
                            "quantity" => $quantity,
                            "image" => $image,
                            "iid" => $_SESSION['iid'],
                            "pid" => $pid
                          );
    $minvoicedetail->addInvoiceDetail($detail_input_data);
  }

  redirect("http://localhost/www/herbal_tea/index.php?controller=cart");
}
