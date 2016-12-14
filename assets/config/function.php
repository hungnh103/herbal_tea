<?php
function __autoload($url){
  $url = strtolower($url);
  $url = str_replace("_", "/", $url);
  $url = str_replace("model", "models", $url);
  require("$url.php");
}

function loadview($url, $data = ""){
  require("views/$url.php");
}

function redirect($url = "BASEPATH"){
  header("location:".BASEPATH."$url");
  exit();
}

date_default_timezone_set("Asia/Ho_Chi_Minh");
