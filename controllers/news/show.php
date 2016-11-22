<?php
$data = "";
$nid = $_GET['nid'];
$mnews = new Model_News;
$data = $mnews->getNewsByNid($nid);

loadview("news/show", $data);
