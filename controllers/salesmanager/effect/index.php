<?php
$meffect = new Model_Effect;
$meffect->order("oeid", "DESC");
$data['data'] = $meffect->listEffect();
loadview("salesmanager/effect/index", $data);
