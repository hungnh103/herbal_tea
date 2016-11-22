<?php
if(isset($_GET['action'])) {
  switch($_GET['action']) {
    case "show": require("controllers/news/show.php"); break;
  }
} else {
  require("controllers/news/index.php");
}
