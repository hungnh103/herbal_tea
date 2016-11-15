<?php
loadview("layouts/simple_header");
?>

<script type="text/javascript">
  function check_delete(){
    if(!window.confirm("Chắc chắn muốn xoá thành viên này?")) return false;
  }

  function check_change_level(){
    if(!window.confirm("Chắc chắn muốn chuyển đổi loại tài khoản?")) return false;
  }

  $(document).ready(function(){
    $("#users_filter").change(function(){
      level = $(this).val();
      $.ajax({
        url:"index.php?controller=admin&resources=user&action=index_ajax",
        type:"get",
        data:"level="+level,
        async:true,
        success:function(result){
          $("#users_list").html(result);
        }
      });
      return false;
    });
  });
</script>

<div id="admin_mainpage">
  <div id="admin_filter">
    <form>
      <span>Hiển thị người dùng</span>
      <select id='users_filter' class='form-control'>
        <option value='0'>-- Tất cả --</option>
        <option value='1'>Tài khoản thường</option>
        <option value='2' style='font-weight: bold; color: blue;'>Quản lý bán hàng</option>
        <option value='3' style='font-weight: bold; color: red;'>Quản trị viên</option>
      </select>
    </form>
  </div>
  <div id="users_list">
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th class='index'>STT</th>
          <th class='name'>Tên</th>
          <th class='email'>Email</th>
          <th class='coin'>Xu tích luỹ</th>
          <th class='level'>Loại tài khoản</th>
          <th class='change_level'>Chuyển đổi tài khoản</th>
          <th class='del'>Xoá</th>
          <th class='check'></th>
        </tr>
      </thead>

      <tbody>
        <?php
        $stt = 1;
        foreach($data as $item){
          echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$item[name]</td>";
            echo "<td>$item[email]</td>";
            if($item['level'] == 1){
              echo "<td>".number_format($item['accumulative_coins'])."</td>";
              echo "<td>Thường</td>";
              echo "<td><a href='index.php?controller=admin&resources=user&action=edit&uid=$item[uid]&level=$item[level]' onclick='return check_change_level();'><span class='icon_change_level'></span></td>";
              echo "<td><a href='index.php?controller=admin&resources=user&action=destroy&uid=$item[uid]' onclick='return check_delete();'><span class='icon_delete'></span></a></td>";
              echo "<td><input type='checkbox'></td>";
            }elseif($item['level'] == 2){
              echo "<td>&nbsp;</td>";
              echo "<td style='color: blue; font-weight: bold;'>Quản lý bán hàng</td>";
              echo "<td><a href='index.php?controller=admin&resources=user&action=edit&uid=$item[uid]&level=$item[level]' onclick='return check_change_level();'><span class='icon_change_level'></span></td>";
              echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
            }else{
              echo "<td>&nbsp;</td>";
              echo "<td style='color: red; font-weight: bold;'>Quản trị viên</td>";
              echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
            }
          echo "</tr>";

          $stt++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?php
loadview("layouts/footer");
?>
