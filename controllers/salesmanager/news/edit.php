<?php
$nid = $_GET['nid'];
$mnews = new Model_News;
$data['news'] = $mnews->getNewsByNid($nid);

if(isset($_POST['ok'])) {
  $title = $content = $image = "";
  if (empty($_POST['title'])) {
    $data['error'][] = "Không xoá tiêu đề";
  } else {
    $title = $_POST['title'];
  }

  if (empty($_POST['content'])) {
    $data['error'][] = "Không xoá nội dung";
  } else {
    $content = $_POST['content'];
  }

  if ($_FILES['image']['name']) {
    $image = $_FILES['image']['name'];
  } else {
    $image = "none";
  }

  if ($title && $content && $image) {
    $update_data = array(
                      "title" => $title,
                      "content" => $content
                    );

    if ($image != "none") {
      $update_data['poster'] = $image;
      move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/news/".$_FILES['image']['name']);
    }

    $mnews->udpateNews($update_data);
    redirect("index.php?controller=salesmanager&resources=news&action=index");
  }
}

$data['title_tag'] = "Chỉnh sửa bài viết";
loadview("salesmanager/news/edit", $data);
