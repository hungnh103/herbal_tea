<?php
$iid = $_GET['iid'];
$current_page = $_GET['page'];
$minvoice = new Model_Invoice;
$minvoice->updateInvoiceStatus($iid);
redirect("index.php?controller=salesmanager&resources=invoice&page=$current_page");
