<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "new": require("controllers/user/address/new.php"); break;
    case "list_district_ajax": require("controllers/user/address/list_district_ajax.php"); break;
    case "list_commune_ajax": require("controllers/user/address/list_commune_ajax.php"); break;
    case "destroy": require("controllers/user/address/destroy.php"); break;
    case "edit": require("controllers/user/address/edit.php"); break;
  }
}
