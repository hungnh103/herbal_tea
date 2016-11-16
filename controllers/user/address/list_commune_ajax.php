<?php
$distid = $_GET['distid'];
$mcommune = new Model_Commune;
$data['commune'] = $mcommune->listCommuneByDistid($distid);

echo "<option value='0'>Chọn Xã/Phường</option>";
foreach ($data['commune'] as $item) {
  echo "<option value='$item[commid]'>$item[name]</option>";
}
