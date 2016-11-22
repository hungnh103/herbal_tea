<?php
$nid = $_GET['nid'];
$mnews = new Model_News;
$mnews->deleteNews($nid);
redirect("index.php?controller=salesmanager&resources=news&action=index");
