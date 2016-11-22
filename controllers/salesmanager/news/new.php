<?php
$data = "";

if(isset($_POST['ok'])) {
  $title = $image = $content = "";
  if(empty($_POST['title'])) {
    $data['error'][] = "Chưa nhập tiêu đề";
  } else {
    $title = $_POST['title'];
  }

  if(empty($_FILES['image']['name'])) {
    $data['error'][] = "Chưa chọn ảnh minh hoạ";
  } else {
    $image = $_FILES['image']['name'];
  }

  if(empty($_POST['content'])) {
    $data['error'][] = "Chưa nhập nội dung";
  } else {
    $content = $_POST['content'];
  }

  if ($title && $image && $content) {
    $input_data = array(
                    "title" => $title,
                    "poster" => $image,
                    "content" => $content,
                    "created_at" => date("Y:m:d H:i:s")
                  );
    $mnews = new Model_News;
    $mnews->addNews($input_data);
    move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/news/".$_FILES['image']['name']);
    redirect("index.php?controller=salesmanager&resources=news&action=index");
  }
}

loadview("salesmanager/news/new", $data);
