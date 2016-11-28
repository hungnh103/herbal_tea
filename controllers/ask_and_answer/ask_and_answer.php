<?php
if(isset($_GET['action'])) {
  switch ($_GET['action']) {
    case "new": require("controllers/ask_and_answer/new.php"); break;
    case "index": require("controllers/ask_and_answer/index.php"); break;
  }
} else {
  require("controllers/ask_and_answer/index.php");
}
