<?php
if(isset($_GET['action'])){
  switch($_GET['action']){
    case "home": loadview("static_pages/home", $data); break;
    case "guide":
      $data['title_tag'] = "Hướng dẫn mua hàng";
      loadview("static_pages/guide", $data); break;
    case "intro":
      $data['title_tag'] = "Giới thiệu";
      loadview("static_pages/intro", $data); break;
    case "agency_register":
      $data['title_tag'] = "Đăng ký làm đại lý";
      loadview("static_pages/agency_register", $data); break;
  }
}else{

}
