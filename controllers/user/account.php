<?php
$data = "";
$uid = $_GET['uid'];
$muser = new Model_User;
$muser->where("uid = '$uid'");
$data['data'] = $muser->showUser();

$maddressregister = new Model_AddressRegister;
$mcommune = new Model_Commune;
$mdistrict = new Model_District;
$mprovince = new Model_Province;
$data['addr'] = $maddressregister->listAddressRegisterByUid($uid);
if($data['addr'] != "") {
  $i = 0;
  foreach ($data['addr'] as $item){
    $comm_info = $mcommune->getCommuneById($item['commid']);
    $data['addr'][$i]['comm_name'] = $comm_info['name'];
    $dist_info =  $mdistrict->getDistrictById($comm_info['distid']);
    $data['addr'][$i]['dist_name'] = $dist_info['name'];
    $prov_info = $mprovince->getProvinceById($dist_info['provid']);
    $data['addr'][$i]['prov_name'] = $prov_info['name'];

    $i++;
  }
}


if(isset($_POST['ok'])){
  $name = $new_pass = $avatar = "";
  if(empty($_POST['txtname'])){
    $data['error'][] = "Tên người dùng không được để trống";
  }else{
    $name = $_POST['txtname'];
  }

  if(!empty($_POST['new_pass'])){
    if(empty($_POST['old_pass'])){
      $data['error'][] = "Vui lòng nhập mật khẩu cũ";
    }else{
      if(md5($_POST['old_pass']) != $data['data']['password']){
        $data['error'][] = "Mật khẩu cũ không đúng";
      }else{
        if($_POST['new_pass'] != $_POST['renew_pass']){
          $data['error'][] = "Mật khẩu mới và xác nhận mật khẩu mới không khớp";
        }else{
          $new_pass = $_POST['new_pass'];
        }
      }
    }
  }else{
    $new_pass = "none";
  }

  if(empty($_FILES['avatar']['name'])){
    $avatar = "none";
  }else{
    $avatar = $_FILES['avatar']['name'];
  }

  if($name && $new_pass && $avatar){
    $input_data = array(
                    "name" => $name
                  );
    $_SESSION['name'] = $name;
    if($new_pass != "none"){
      $input_data['password'] = md5($new_pass);
    }
    if($avatar != "none"){
      $input_data['avatar'] = $avatar;
      $_SESSION['avatar'] = $avatar;
      move_uploaded_file($_FILES['avatar']['tmp_name'], "assets/images/users/".$_FILES['avatar']['name']);
    }
    $muser->updateUser($input_data);
    redirect("index.php?controller=user&uid=$uid");
  }
}

$data['title_tag'] = "Tài khoản";
loadview("user/account", $data);
