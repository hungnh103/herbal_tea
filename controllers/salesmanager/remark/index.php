<?php
$mremark = new Model_Remark;
$mremark->order("remid", "DESC");
$data = $mremark->listRemark();
if(!empty($data)){
  $i = 0;
  $mproduct = new Model_Product;
  $mproduct->select("name");
  foreach($data as $item){
    $product_info = $mproduct->getProductById($item['pid']);
    $data[$i]['product_name'] = $product_info['name'];
    $i++;
  }
}

loadview("salesmanager/remark/index", $data);
