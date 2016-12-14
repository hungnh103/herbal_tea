<?php
$data = "";
$nid = $_GET['nid'];
$mnews = new Model_News;
$data['news'] = $mnews->getNewsByNid($nid);
$data['title_tag']  = $data['news']['title'];
loadview("news/show", $data);
