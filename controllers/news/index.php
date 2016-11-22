<?php
$data = "";
$mnews = new Model_News;
$mnews->order("nid", "DESC");
$data = $mnews->listNews();

loadview("news/index", $data);
