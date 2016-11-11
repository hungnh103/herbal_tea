<?php
$data = "";
if(isset($_POST['ok'])){
  $email = $pass = "";
  if(empty($_POST['txtemail'])){
    $data['error'][] = "Email không được để trống";
  }else{
    $email = $_POST['txtemail'];
  }

  if(empty($_POST['txtpass'])){
    $data['error'][] = "Mật khẩu không được để trống";
  }else{
    $pass = $_POST['txtpass'];
  }

  if($email && $pass){
    $_SESSION['name'] = "admin";
    $_SESSION['pass'] = "123";
    $_SESSION['level'] = "3";
    redirect("http://localhost/www/herbal_tea/");
  }
}

loadview("sessions/new", $data);
