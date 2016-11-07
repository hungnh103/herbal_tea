<?php
$data = "";
if(isset($_POST['ok'])){
  $u = $p = "";
  if(empty($_POST['txtname'])){
    $data['err'][] = "Dien ten dang nhap";
  }else{
    $u = $_POST['txtname'];
  }

  if(empty($_POST['txtpass'])){
    $data['err'][] = "Mat khau ko duoc de trong";
  }else{
    $p = $_POST['txtpass'];
  }

  if($u == "admin" && $p == "123"){
    $_SESSION['name'] = "admin";
    $_SESSION['pass'] = "123";
    $_SESSION['level'] = "3";
    redirect("http://localhost/www/herbal_tea/");
  }
}

loadview("sessions/new", $data);
