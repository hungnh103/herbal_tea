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

function redirect($url){
  header("location:$url");
  exit();
}
