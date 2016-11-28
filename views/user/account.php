<?php
if($_SESSION['level'] == 1){
  loadview("layouts/header");
}else{
  loadview("layouts/simple_header");
}

if($_SESSION['level'] != 1){
  echo "<div id='back_to_main_page'>";
    if($_SESSION['level'] == 2){
      echo "<a href='index.php?controller=salesmanager' class='btn btn-info'>← Đi đến trang quản lý</a>";
    }else{
      echo "<a href='index.php?controller=admin' class='btn btn-info'>← Đi đến trang quản lý</a>";
    }
  echo "</div>";
}
?>

<script type="text/javascript">
  function check_delete_addr(){
    if (!window.confirm("Bạn chắc chắn muốn xoá sổ địa này?")) return false;
  }
</script>

<div id="user_profile" style="min-height: 365px;">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" <?php if(empty($data['error'])) echo "class='active'"; ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin chung</a></li>
    <li role="presentation" <?php if(!empty($data['error'])) echo "class='active'"; ?>><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Chỉnh sửa hồ sơ</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?php if(empty($data['error'])) echo "active"; ?>" id="home">


      <div id="account_info">
        <span style="display: block;">Tài khoản</span>
        <table>
          <tr>
            <td>Tên người dùng:</td>
            <td><?php echo $data['data']['name']; ?></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><?php echo $data['data']['email']; ?></td>
          </tr>
          <tr>
            <td>Loại tài khoản:</td>
            <td>
              <?php
              switch($data['data']['level']){
                case "1": echo "Thành viên"; break;
                case "2": echo "<span style='color: blue; font-weight: bold;'>Quản lý bán hàng</span>"; break;
                case "3": echo "<span style='color: red; font-weight: bold;'>Quản trị viên</span>"; break;
              }
              ?>
            </td>
          </tr>
        </table>
      </div>

      <div class="clr"></div>

      <?php
      if($_SESSION['level'] == 1){
        echo "<div id='address_list' style='position: relative;'>";

          echo "<span>Sổ địa chỉ</span> <a href='index.php?controller=user&resources=address&action=new' class='btn btn-success' style='position: absolute; padding: 3px; right: 14px;'>Tạo địa chỉ mới</a>";

          echo "<div class='clr' style='height: 10px;'></div>";

          if($data['addr'] != ""){
            foreach ($data['addr'] as $item) {
              echo "<div class='address_register' style='position: relative;'>";
                echo "<h4>$item[fullname]</h4>";
                echo "<p>Địa chỉ: $item[address], $item[comm_name], $item[dist_name], $item[prov_name]</p>";
                echo "<p>Điện thoại: $item[telephone]</p>";
                echo "<a href='index.php?controller=user&resources=address&action=destroy&addrid=$item[addrid]' onclick='return check_delete_addr();' style='display: block; position: absolute; right: 50px; bottom: 12px;'><span class='icon_delete'></span></a>";
                echo "<a href='index.php?controller=user&resources=address&action=edit&addrid=$item[addrid]' style='display: block; position: absolute; bottom: 10px; right: 5px;'><span class='btn btn-default' style='padding: 3px 5px;'>Sửa</span></a>";
              echo "</div>";
            }
          } else {
            echo "<div class='address_register' style='position: relative;'>";
              echo "Chưa có sổ địa chỉ nào";
            echo "</div>";
          }

        echo "</div>";
      }
      ?>

    </div>
    <div role="tabpanel" class="tab-pane <?php if(!empty($data['error'])) echo "active"; ?>" id="profile">
      <form action="index.php?controller=user&uid=<?php echo $data['data']['uid']; ?>" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Hình đại diện</td>
            <td>
              <img src="assets/images/users/<?php echo $data['data']['avatar']; ?>" style="width: 100px; height: 100px; margin-bottom: 5px;" />
              <div class="clr"></div>
              <span>Chọn ảnh khác</span>
              <input type="file" name="avatar" />
            </td>
          </tr>
          <tr>
            <td>Tên người dùng</td>
            <td><input type="text" name="txtname" class="form-control" value="<?php echo $data['data']['name']; ?>" /></td>
          </tr>
          <tr>
            <td>Mật khẩu cũ</td>
            <td><input type="password" name="old_pass" class="form-control" /></td>
          </tr>
          <tr>
            <td>Mật khẩu mới</td>
            <td><input type="password" name="new_pass" class="form-control" /></td>
          </tr>
          <tr>
            <td>Nhắc lại mật khẩu mới</td>
            <td><input type="password" name="renew_pass" class="form-control" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="ok" value="Cập nhật" class="btn btn-primary" /></td>
          </tr>
        </table>
      </form>

      <div class="error">
      <?php
      if(!empty($data['error'])){
        echo "<ul>";
        foreach($data['error'] as $err){
          echo "<li>$err</li>";
        }
        echo "</ul>";
      }
      ?>
      </div>
    </div>
  </div>

</div>
<?php
loadview("layouts/footer");
?>
