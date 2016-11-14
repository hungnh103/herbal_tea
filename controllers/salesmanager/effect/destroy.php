<?php
$oeid = $_GET['oeid'];
$meffect = new Model_Effect;
$meffect->deleteEffect($oeid);
redirect("index.php?controller=salesmanager&resources=effect&action=index");
