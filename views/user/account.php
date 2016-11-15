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

<div id="user_profile">
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
          <?php
          if($data['data']['level'] == 1){
            echo "<tr>";
              echo "<td>Xu tích luỹ:</td>";
              echo "<td>".$data['data']['accumulative_coins']."</td>";
            echo "</tr>";
          }
          ?>
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
        echo "<div id='address_list'>";
          echo "<span>Sổ địa chỉ</span>";
          echo "<div class='clr'></div>";
          echo "<div class='address_register'>";
            echo "<h4>Nguyễn Huy Hùng</h4>";
            echo "<p>Địa chỉ: Cạnh số nhà 14, ngách 197/32, ngõ 197, Hoàng Mai, Phường Hoàng Văn Thụ, Quận Hoàng Mai, Hà Nội, Việt Nam</p>";
            echo "<p>Điện thoại: 01678592766</p>";
          echo "</div>";
          echo "<div class='address_register'>";
            echo "<h4>Nguyễn Huy Hùng</h4>";
            echo "<p>Địa chỉ: Cạnh số nhà 14, ngách 197/32, ngõ 197, Hoàng Mai, Phường Hoàng Văn Thụ, Quận Hoàng Mai, Hà Nội, Việt Nam</p>";
            echo "<p>Điện thoại: 01678592766</p>";
          echo "</div>";
          echo "<div class='address_register'>";
            echo "<h4>Nguyễn Huy Hùng</h4>";
            echo "<p>Địa chỉ: Cạnh số nhà 14, ngách 197/32, ngõ 197, Hoàng Mai, Phường Hoàng Văn Thụ, Quận Hoàng Mai, Hà Nội, Việt Nam</p>";
            echo "<p>Điện thoại: 01678592766</p>";
          echo "</div>";
          echo "<div class='address_register'>";
            echo "<h4>Nguyễn Huy Hùng</h4>";
            echo "<p>Địa chỉ: Cạnh số nhà 14, ngách 197/32, ngõ 197, Hoàng Mai, Phường Hoàng Văn Thụ, Quận Hoàng Mai, Hà Nội, Việt Nam</p>";
            echo "<p>Điện thoại: 01678592766</p>";
          echo "</div>";
          echo "<div class='address_register'>";
            echo "<h4>Nguyễn Huy Hùng</h4>";
            echo "<p>Địa chỉ: Cạnh số nhà 14, ngách 197/32, ngõ 197, Hoàng Mai, Phường Hoàng Văn Thụ, Quận Hoàng Mai, Hà Nội, Việt Nam</p>";
            echo "<p>Điện thoại: 01678592766</p>";
          echo "</div>";
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
