<?php
$per_page = 7;
$muser = new Model_User;
$muser->listUser();
$users_amount = $muser->num_rows();
$data['page'] = ceil($users_amount / $per_page);

$muser->order("uid", "DESC");
if (isset($_GET['page'])) {
  $data['current_page'] = $_GET['page'];
  $start = $per_page * ($data['current_page'] - 1);
  $muser->limit($per_page, $start);
} else {
  $muser->limit($per_page);
  $data['current_page'] = 1;
}

$data['user'] = $muser->listUser();
if (!empty($data['user'])) {
  $minvoice = new Model_Invoice;
  $minvoice->select("iid");
  $mremark = new Model_Remark;
  $mremark->select("remid");
  $i = 0;
  foreach ($data['user'] as $item) {
    if ($item['level'] == 1) {
      $invoices_amount = $minvoice->countInvoiceByUid($item['uid']);
      $data['user'][$i]['invoices_amount'] = $invoices_amount;
      $remarks_amount = $mremark->countRemarkByUid($item['uid']);
      $data['user'][$i]['remarks_amount'] = $remarks_amount;
    } else {
      $data['user'][$i]['invoices_amount'] = $data['user'][$i]['remarks_amount'] = 0;
    }
    $i++;
  }
}

$data['title_tag'] = "Quản lý thành viên";
loadview("admin/user/index", $data);
