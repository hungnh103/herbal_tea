<?php
loadview("layouts/header");
?>
<div>
  <form id="signup_form" action="index.php?controller=user&action=signup" method="post">
  <?php
  if(!empty($data)){
    echo "<div class='error'>";
        echo "<ul>";
        foreach($data['error'] as $err){
          echo "<li>$err</li>";
        }
        echo "</ul>";
    echo "</div>";
  }
  ?>
    <table>
      <tr>
        <td>Tên người dùng <span style='color: red;'>*</span></td>
        <td style="width: 300px;"><input type="text" name="txtuser" class="form-control" id="signup_txtuser"></td>
      </tr>
      <tr>
        <td>Email <span style='color: red;'>*</span></td>
        <td style="width: 300px;"><input type="text" name="txtemail" class="form-control" id="signup_txtemail"></td>
      </tr>
      <tr>
        <td>Mật khẩu <span style='color: red;'>*</span></td>
        <td style="width: 300px;"><input type="password" name="txtpass" class="form-control" id="signup_txtpass"></td>
      </tr>
      <tr>
        <td>Xác nhận mật khẩu <span style='color: red;'>*</span></td>
        <td style="width: 300px;"><input type="password" name="txtpass2" class="form-control" id="signup_txtpass2"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="Đăng ký" class="btn btn-info" id="signup_ok"></td>
      </tr>
      <tr>
        <td></td>
        <td>Đã có tài khoản? <a href="index.php?controller=session&action=new">Đăng nhập</a></td>
      </tr>
    </table>
  </form>
</div>
<?php
loadview("layouts/footer");
?>
