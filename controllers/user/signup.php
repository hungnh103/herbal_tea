<?php
$data = "";
if(isset($_POST['ok'])){
  $user = $email = $pass = "";
  if(empty($_POST['txtuser'])){
    $data['error'][] = "Tên người dùng không được để trống";
  }else{
    $user = $_POST['txtuser'];
  }

  if(empty($_POST['txtemail'])){
    $data['error'][] = "Email không được để trống";
  }else{
    $email = $_POST['txtemail'];
  }

  if(empty($_POST['txtpass'])){
    $data['error'][] = "Mật khẩu không được để trống";
  }else{
    if($_POST['txtpass'] != $_POST['txtpass2']){
      $data['error'][] = "Mật khẩu và xác nhận mật khẩu không khớp";
    }else{
      $pass = $_POST['txtpass'];
    }
  }

  if($user && $email && $pass){

  }
}

loadview("static_pages/signup", $data);

