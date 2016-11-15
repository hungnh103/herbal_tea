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
    $pass = md5($pass);
    $muser = new Model_User;
    $arr = array("email =" => $email, "password =" => $pass);
    $muser->where($arr);
    if($muser->checkUser() == false){
      $info = $muser->fetch();
      $_SESSION['uid'] = $info['uid'];
      $_SESSION['avatar'] = $info['avatar'];
      $_SESSION['name'] = $info['name'];
      $_SESSION['level'] = $info['level'];
      if($_SESSION['level'] == 1){
        redirect("http://localhost/www/herbal_tea/");
      }elseif($_SESSION['level'] == 2){
        redirect("http://localhost/www/herbal_tea/index.php?controller=salesmanager");
      }else{
        redirect("http://localhost/www/herbal_tea/index.php?controller=admin");
      }
    }else{
      $data['error'][] = "Email hoặc mật khẩu không chính xác";
    }
  }
}

loadview("sessions/new", $data);
