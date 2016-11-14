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
    $muser = new Model_User;
    $muser->where("email = '$email'");
    $muser->select("email");
    if($muser->checkUser() == true){
      $pass = md5($pass);
      $input_data = array("name" => $user, "email" => $email, "password" => $pass);
      $muser->addUser($input_data);
      redirect("index.php?controller=session&action=new");
    }else{
      $data['error'][] = "Email đã tồn tại, vui lòng chọn email khác";
    }
  }
}

loadview("static_pages/signup", $data);
