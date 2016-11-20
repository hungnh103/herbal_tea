<?php
$addrid = $_GET['addrid'];
$maddressregister = new Model_AddressRegister;
$maddressregister->select("uid");
$addrreg_info = $maddressregister->getAddressRegisterById($addrid);
$maddressregister->deleteAddressRegister($addrid);
redirect("index.php?controller=user&uid=$addrreg_info[uid]");
