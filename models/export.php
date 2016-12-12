<?php
require("../assets/library/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A1", "Mã sản phẩm")
->setCellValue("B1", "Tên sản phẩm")
->setCellValue("C1", "Giá")
->setCellValue("D1", "Số lượng")
->setCellValue("E1", "Quy cách đóng gói")
->setCellValue("F1", "Mô tả")
->setCellValue("G1", "Ngày nhập kho")
->setCellValue("H1", "Điểm bình chọn")
->setCellValue("I1", "Số lần bình chọn")
->setCellValue("J1", "Đã bán")
->setCellValue("K1", "Mã công dụng nổi bật");

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("herbal_tea", $conn);
mysql_set_charset("utf8", $conn);
$result = mysql_query("SELECT * FROM products");
$product_info = "";
while ($data = mysql_fetch_assoc($result)) {
  $product_info[] = $data;
}

//set gia tri cho cac cot du lieu
$i = 2;
$packing_method = "";
foreach ($product_info as $item) {
  switch ($item['packing_method']) {
    case "1": $packing_method = "Lọ thuỷ tinh"; break;
    case "2": $packing_method = "Gói to"; break;
    case "3": $packing_method = "Gói nhỏ"; break;
  }
  $objPHPExcel->setActiveSheetIndex(0)
  ->setCellValue("A".$i, $item['pid'])
  ->setCellValue("B".$i, $item['name'])
  ->setCellValue("C".$i, $item['price'])
  ->setCellValue("D".$i, $item['quantity'])
  ->setCellValue("E".$i, $packing_method)
  ->setCellValue("F".$i, $item['description'])
  ->setCellValue("G".$i, date("d/m/Y H:i", strtotime($item['created_at'])))
  ->setCellValue("H".$i, $item['rating'])
  ->setCellValue("I".$i, $item['rating_times'])
  ->setCellValue("J".$i, $item['sold'])
  ->setCellValue("K".$i, $item['oeid']);

  $i++;
}

//ghi du lieu vao file, định dạng file excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
$full_path = "../assets/export/product.xlsx";//duong dan file
$objWriter->save($full_path);


// download file vua duoc tao ra
// mo file o che do doc nhi phan
$fn = "product.xlsx";
// mo file o che do doc nhi phan
$f = fopen("../assets/export/".$fn, "rb");

// bao cho trinh duyet biet noi dung tra ve o dang nhi phan
header("Content-Type:application/octet-stream");

// thong bao dung luong file muon download
header("Content-Length:".filesize("../assets/export/$fn"));

// thong bao ten file va file can duoc download chu ko mo truc tiep tren trinh duyet
header("Content-Disposition:attachment; filename=$fn");

// doc noi dung file va tra lai cho tirnh duyet xu ly
fpassthru($f);

// ket thuc download, dong file
fclose($f);

header("location:index.php?controller=salesmanager&resources=product");
exit();
