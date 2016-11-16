<?php
$mproduct = new Model_Product;
$mproduct->order("pid", "DESC");
$data['product'] = $mproduct->listProduct();
$meffect = new Model_Effect;
$meffect->order("oeid", "DESC");
$data['effect'] = $meffect->listEffect();
loadview("product/index", $data);
