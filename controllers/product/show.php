<?php
$pid = $_GET['pid'];
$mproduct = new Model_Product;
$data['product'] = $mproduct->getProductById($pid);

$mremark = new Model_Remark;
$mremark->order("remid", "DESC");
$data['remark'] = $mremark->getRemarkByPid($pid);
if (!empty($data['remark'])) {
  $muser = new Model_User;
  $muser->select("name, avatar");
  $i = 0;
  foreach ($data['remark'] as $item) {
    $muser->where("uid = '$item[uid]'");
    $user_info = $muser->showUser();
    $data['remark'][$i]['name']= $user_info['name'];
    $data['remark'][$i]['avatar'] = $user_info['avatar'];
    $i++;
  }
}

if(isset($_POST['ok'])) {
  $score = $content = "";
  if(empty($_POST['score'])){
    $data['error'][] = "Vui lòng đánh giá sản phẩm";
  } else {
    $score = $_POST['score'];
  }

  if(empty($_POST['content'])){
    $data['error'][] = "Vui lòng viết bình luận về sản phẩm";
  } else {
    $content = $_POST['content'];
  }

  if($score && $content){
    $input_data = array(
                    "rating" => $score,
                    "content" => $content,
                    "uid" => $_SESSION['uid'],
                    "pid" => $pid
                  );

    $mremark->addRemark($input_data);
    redirect("index.php?controller=product&action=show&pid=$pid");
  }
}

loadview("product/show", $data);
