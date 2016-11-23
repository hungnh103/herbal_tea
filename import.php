<?php
$data = $_FILES['import_data']['name'];
move_uploaded_file($_FILES['import_data']['tmp_name'], "assets/import/$data");

require("assets/library/PHPExcel.php");
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("herbal_tea", $conn);
mysql_set_charset("utf8", $conn);

$filename = "assets/import/".$data;
$inputFileType = PHPExcel_IOFactory::identify($filename);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);

$objReader->setReadDataOnly(true);

/**  Load $inputFileName to a PHPExcel Object  **/
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

// insert vao co so du lieu
$total_quantity = 0;
foreach ($arraydata as $item) {
  $total_quantity += $item['2'];
  $sql = "INSERT INTO products(name, price, quantity, packing_method, description) VALUES('$item[0]', '$item[1]', '$item[2]', '$item[3]', '$item[4]')";
  mysql_query($sql);
}

$sql = "SELECT products_amount FROM outstanding_effects WHERE oeid='1'";
$result = mysql_query($sql);
$oe_info = mysql_fetch_assoc($result);
$new_quantity = $oe_info['products_amount'] + $total_quantity;
$sql = "UPDATE outstanding_effects SET products_amount='$new_quantity' WHERE oeid='1'";
mysql_query($sql);

header("location:index.php?controller=salesmanager&resources=product");
exit();
