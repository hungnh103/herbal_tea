<?php
loadview("layouts/header");
?>
<form action="index.php?controller=session&action=new" method="POST">
  <table>
    <tr>
      <td>Username</td>
      <td><input type='text' name='txtname' class='form-control' /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type='password' name='txtpass' class='form-control' /></td>
    </tr>
    <tr>
      <td></td>
      <td><input type='submit' name="ok" class='btn btn-info' /></td>
    </tr>
    <tr>
      <td></td>
      <td>Chua co tai khoan? <a href="">Dang ky</a></td>
    </tr>
  </table>
</form>

<?php
if(isset($data['err'])){
  foreach($data['err'] as $value){
    echo "$value<br />";
  }
}

loadview("layouts/footer");
?>
