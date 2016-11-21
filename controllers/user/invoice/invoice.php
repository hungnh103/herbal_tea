<?php
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case "index": require("controllers/user/invoice/index.php"); break;
    case "show": require("controllers/user/invoice/show.php"); break;
  }
} else {
  require("controllers/user/invoice/index.php");
}
