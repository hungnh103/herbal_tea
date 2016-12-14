<?php
$mremark = new Model_Remark;
$mremark->order("remid", "DESC");
$data['data'] = $mremark->listRemark();
if(!empty($data['data'])){
  $i = 0;
  $mproduct = new Model_Product;
  $mproduct->select("name");
  foreach($data['data'] as $item){
    $product_info = $mproduct->getProductById($item['pid']);
    $data['data'][$i]['product_name'] = $product_info['name'];
    $i++;
  }
}

$data['title_tag'] = "Ý kiến người dùng";
loadview("salesmanager/remark/index", $data);
