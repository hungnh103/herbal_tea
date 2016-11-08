<?php
loadview("layouts/header");
?>
<div id="">
  <form id="login_form" action="index.php?controller=session&action=new" method="post">
  <?php
  if(!empty($data)){
    echo "<div class='error'>";
      foreach($data['error'] as $err){
        echo "<ul>";
          echo "<li>$err</li>";
        echo "</ul>";
      }
    echo "</div>";
  }
  ?>
    <table>
      <tr>
        <td>Email <span style='color: red;'>*</span></td>
        <td style="width: 300px;"><input type="text" name="txtemail" class="form-control"></td>
      </tr>
      <tr>
        <td>Mật khẩu <span style='color: red;'>*</span></td>
        <td style="width: 300px;"><input type="password" name="txtpass" class="form-control"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="Đăng nhập" class="btn btn-info"></td>
      </tr>
      <tr>
        <td></td>
        <td>Chưa có tài khoản? <a href="index.php?controller=user&action=signup">Đăng ký</a></td>
      </tr>
    </table>
  </form>
</div>
<?php
if(isset($data['err'])){
  foreach($data['err'] as $value){
    echo "$value<br />";
  }
}

loadview("layouts/footer");
?>
