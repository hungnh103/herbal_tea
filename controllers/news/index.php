<?php
$data = "";
$mnews = new Model_News;
$mnews->order("nid", "DESC");
$data['news'] = $mnews->listNews();
$data['title_tag'] = "Tin tức";
loadview("news/index", $data);
