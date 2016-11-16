<?php
$provid = $_GET['provid'];
$mdistrict = new Model_District;
$data['district'] = $mdistrict->listDistrictByProvid($provid);

echo "<option value='0'>Chọn Quận/Huyện</option>";
foreach ($data['district'] as $item){
  echo "<option value='$item[distid]'>$item[name]</option>";
}
