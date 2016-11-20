<?php
$data = "";
$data['data']['addrid'] = $_POST['addrid'];
$data['data']['fullname'] = $_POST['fullname'];
$data['data']['address'] = $_POST['address'];
$data['data']['comm_name'] = $_POST['comm_name'];
$data['data']['dist_name'] = $_POST['dist_name'];
$data['data']['prov_name'] = $_POST['prov_name'];
$data['data']['telephone'] = $_POST['telephone'];

$minvoicedetail = new Model_InvoiceDetail;
$minvoicedetail->select("name, price, quantity, pid");
$minvoicedetail->order("idid", "DESC");
$data['product'] = $minvoicedetail->listInvoiceDetail($_SESSION['iid']);

if (isset($_POST['ok'])) {
  $payment_method = $account_holder = $account_number = $bank = "";
  if (empty($_POST['payment_method'])) {
    $data['error'][] = "Vui lòng chọn hình thức thanh toán";
  } else {
    $payment_method = $_POST['payment_method'];
    if ($payment_method == 2) {
      $data['atm'] = "checking";
      if (empty($_POST['account_holder'])) {
        $data['error'][] = "Vui lòng điền tên chủ tài khoản";
      } else {
        $account_holder = $_POST['account_holder'];
      }

      if (empty($_POST['account_number'])) {
        $data['error'][] = "Vui lòng điền số tài khoản";
      } else {
        $account_number = $_POST['account_number'];
      }

      if(empty($_POST['bank'])) {
        $data['error'][] = "Vui lòng nhập tên ngân hàng";
      } else {
        $bank = $_POST['bank'];
      }
    } else {
      $account_holder = $account_number = $bank = "none";
    }
  }

  if ($payment_method && $account_holder && $account_number && $bank) {
    // update invoices table
    $update_invoices = array(
                      "payment_method" => $payment_method,
                      "status" => "2",
                      "addrid" => $data['data']['addrid']
                    );
    if ($payment_method == 2) {
      $update_invoices['account_holder'] = $account_holder;
      $update_invoices['account_number'] = $account_number;
      $update_invoices['bank'] = $bank;
    }
    $minvoice = new Model_Invoice;
    $minvoice->where("iid = '$_SESSION[iid]'");
    $minvoice->updateInvoice($update_invoices);

    // update products table and outstanding_effects
    $mproduct = new Model_Product;
    $meffect = new Model_Effect;
    foreach ($data['product'] as $p) {
      $oeid = $mproduct->updateAfterOrder($p['pid'], $p['quantity']);
      $meffect->updateAfterOrder($oeid, $p['quantity']);
    }
    $_SESSION['iid'] = 0;
    $_SESSION['products_amount'] = 0;
    $_SESSION['total'] = 0;
    redirect("index.php?controller=cart&action=order");
  }
}

loadview("cart/payment", $data);
