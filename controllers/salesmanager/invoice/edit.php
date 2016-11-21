<?php
$iid = $_GET['iid'];
$minvoice = new Model_Invoice;
$minvoice->updateInvoiceStatus($iid);
redirect("index.php?controller=salesmanager&resources=invoice&action=index");
