<?php
$level = $_GET['level'];
$muser = new Model_User;
$muser->order("uid", "DESC");
if($level != 0){
  $muser->where("level = '$level'");
}
$data = $muser->listUser();
?>

<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th class='index'>STT</th>
      <th class='name'>Tên</th>
      <th class='email'>Email</th>
      <th class='level'>Loại tài khoản</th>
      <th class='change_level'>Chuyển đổi tài khoản</th>
      <th class='del'>Xoá</th>
      <th class='check'></th>
    </tr>
  </thead>

  <tbody>
  <?php
  if($data == ""){
    echo "<tr>";
      echo "<td colspan='8'>Không có dữ liệu</td>";
    echo "</tr>";
  }else{
    $stt = 1;
    foreach($data as $item){
      echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$item[name]</td>";
        echo "<td>$item[email]</td>";
        if($item['level'] == 1){
          echo "<td>Thường</td>";
          echo "<td><a href='".BASEPATH."admin/user/edit/$item[uid]/level=$item[level]' onclick='return check_change_level();'><span class='icon_change_level'></span></td>";
          echo "<td><a href='".BASEPATH."admin/user/destroy/$item[uid]' onclick='return check_delete();'><span class='icon_delete'></span></a></td>";
          echo "<td><input type='checkbox'></td>";
        }elseif($item['level'] == 2){
          echo "<td style='color: blue; font-weight: bold;'>Quản lý bán hàng</td>";
          echo "<td><a href='".BASEPATH."admin/user/edit/$item[uid]/$item[level]' onclick='return check_change_level();'><span class='icon_change_level'></span></td>";
          echo "<td>&nbsp;</td>";
          echo "<td>&nbsp;</td>";
        }else{
          echo "<td style='color: red; font-weight: bold;'>Quản trị viên</td>";
          echo "<td>&nbsp;</td>";
          echo "<td>&nbsp;</td>";
          echo "<td>&nbsp;</td>";
        }
      echo "</tr>";

      $stt++;
    }
  }
  ?>
  </tbody>
</table>
