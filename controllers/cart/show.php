<?php
$data = "";
$_SESSION['is_remain'] = 0;
if(isset($_SESSION['level'])){
  $minvoicedetail = new Model_InvoiceDetail;
  $minvoicedetail->order("idid", "DESC");
  $data['detail'] = $minvoicedetail->listInvoiceDetail($_SESSION['iid']);
  if (!empty($data['detail'])) {
    $mproduct = new Model_Product;
    $mproduct->select("quantity");
    $i = 0;
    foreach ($data['detail'] as $item) {
      $remain_amount = $mproduct->getProductById($item['pid']);
      if ($item['quantity'] > $remain_amount['quantity']) {
        $data['detail'][$i]['check'] = $remain_amount['quantity'];
        $_SESSION['is_remain']++;
      } else {
        $data['detail'][$i]['check'] = -1;
      }
      $i++;
    }
  }
}

loadview("cart/show", $data);
