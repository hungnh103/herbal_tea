<?php
move_uploaded_file($_FILES['import_data']['tmp_name'], "../assets/import/product.xlsx");

require("../assets/library/PHPExcel.php");
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("herbal_tea", $conn);
mysql_set_charset("utf8", $conn);

$filename = "../assets/import/product.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($filename);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);

$objReader->setReadDataOnly(true);

/**  Load $filename to a PHPExcel Object  **/
$objPHPExcel = $objReader->load("$filename");

$total_sheets = $objPHPExcel->getSheetCount();

$allSheetName = $objPHPExcel->getSheetNames();
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

$arraydata = array();
for ($row = 2; $row <= $highestRow;++$row) {
  for ($col = 0; $col <$highestColumnIndex;++$col) {
    $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
    $arraydata[$row-2][$col]=$value;
  }
}


// update products table
$oe_change = "";
$sql = "SELECT oeid, products_amount FROM outstanding_effects";
$query = mysql_query($sql);
while ($data_oe = mysql_fetch_assoc($query)) {
  $key = $data_oe['oeid'];
  $amount = $data_oe['products_amount'];
  $oe_change[$key] = $amount;
}


foreach ($arraydata as $item) {
  switch ($item[4]) {
    case "Lọ thuỷ tinh": $item[4] = 1; break;
    case "Gói to": $item[4] = 2; break;
    case "Gói nhỏ": $item[4] = 3; break;
  }

  if (empty($item[0])) {
    // them san pham moi
    $oe_change[1] += $item[3];
    $sql = "INSERT INTO products(name, price, quantity, packing_method, description) VALUES('$item[1]', '$item[2]', '$item[3]', '$item[4]', '$item[5]')";
  } else {
    // chinh sua san pham
    $sql = "SELECT price, quantity FROM products WHERE pid='$item[0]'";
    $query = mysql_query($sql);
    $data_pr = mysql_fetch_assoc($query);
    $diff_quantity = $item[3] - $data_pr['quantity'];
    $diff_price = $item[2] - $data_pr['price'];
    if ($diff_quantity != 0) {
      $key = $item[10];
      $oe_change[$key] += $diff_quantity;
      if ($diff_price != 0) {
        // cap nhat bang invoices va bang invoice_details
        $sql = "SELECT invoices.iid, idid, total, price, quantity FROM invoices INNER JOIN invoice_details ON invoices.iid = invoice_details.iid WHERE status='1' AND pid='$item[0]'";
        $query = mysql_query($sql); // co the co nhieu ban ghi
        while ($update_cart = mysql_fetch_assoc($query)) {
          $sql = "UPDATE invoice_details SET price='$item[2]' WHERE idid='$update_cart[idid]'";
          mysql_query($sql);
          $new_total = $update_cart['total'] + $diff_price * $update_cart['quantity'];
          $sql = "UPDATE invoices SET total='$new_total' WHERE iid='$update_cart[iid]'";
          mysql_query($sql);
        }
        $sql = "UPDATE products SET name='$item[1]', price='$item[2]', quantity='$item[3]', packing_method='$item[4]', description='$item[5]' WHERE pid='$item[0]'";
      } else {
        $sql = "UPDATE products SET name='$item[1]', quantity='$item[3]', packing_method='$item[4]', description='$item[5]' WHERE pid='$item[0]'";
      }
    } else {
      if ($diff_price != 0) {
        // cap nhat bang invoices va bang invoice_details
        $sql = "SELECT invoices.iid, idid, total, price, quantity FROM invoices INNER JOIN invoice_details ON invoices.iid = invoice_details.iid WHERE status='1' AND pid='$item[0]'";
        $query = mysql_query($sql); // co the co nhieu ban ghi
        while ($update_cart = mysql_fetch_assoc($query)) {
          $sql = "UPDATE invoice_details SET price='$item[2]' WHERE idid='$update_cart[idid]'";
          mysql_query($sql);
          $new_total = $update_cart['total'] + $diff_price * $update_cart['quantity'];
          $sql = "UPDATE invoices SET total='$new_total' WHERE iid='$update_cart[iid]'";
          mysql_query($sql);
        }
        $sql = "UPDATE products SET name='$item[1]', price='$item[2]', packing_method='$item[4]', description='$item[5]' WHERE pid='$item[0]'";
      } else {
        $sql = "UPDATE products SET name='$item[1]', packing_method='$item[4]', description='$item[5]' WHERE pid='$item[0]'";
      }
    }
  }
  mysql_query($sql);
}

// update outstanding_effects table
foreach ($oe_change as $k => $v) {
  $sql = "UPDATE outstanding_effects SET products_amount='$v' WHERE oeid='$k'";
  mysql_query($sql);
}

header("location:http://localhost/www/herbal_tea/index.php?controller=salesmanager&resources=product");
exit();
