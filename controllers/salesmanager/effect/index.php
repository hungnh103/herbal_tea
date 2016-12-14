<?php
$meffect = new Model_Effect;
$meffect->order("oeid", "DESC");
$data['data'] = $meffect->listEffect();
$data['title_tag'] = "Công dụng nổi bật";
loadview("salesmanager/effect/index", $data);
