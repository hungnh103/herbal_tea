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
  <div id="users_list" style="min-height: 324px;">
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
        if (empty($data['user'])) {
          echo "<tr>";
            echo "<td colspan='7'>Chưa có dữ liệu</td>";
          echo "</tr>";
        } else {
          $stt = ($data['current_page'] - 1) * 7 + 1;
          foreach($data['user'] as $item){
            echo "<tr>";
              echo "<td>$stt</td>";
              echo "<td>$item[name]</td>";
              echo "<td>$item[email]</td>";
              if($item['level'] == 1){
                echo "<td>Thường</td>";
                echo "<td><a href='index.php?controller=admin&resources=user&action=edit&uid=$item[uid]&level=$item[level]&page=$data[current_page]' onclick='return check_change_level();'><span class='icon_change_level'></span></td>";
                echo "<td><a href='index.php?controller=admin&resources=user&action=destroy&uid=$item[uid]&page=$data[current_page]' onclick='return check_delete();'><span class='icon_delete'></span></a></td>";
                echo "<td><input type='checkbox'></td>";
              }elseif($item['level'] == 2){
                echo "<td style='color: blue; font-weight: bold;'>Quản lý bán hàng</td>";
                echo "<td><a href='index.php?controller=admin&resources=user&action=edit&uid=$item[uid]&level=$item[level]&page=$data[current_page]' onclick='return check_change_level();'><span class='icon_change_level'></span></td>";
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
  </div>

  <nav aria-label="Page navigation" style="position: relative; height: 68px;">
    <ul class="pagination" style="position: absolute; right: 92px; bottom: 0px;">
      <?php
      if ($data['current_page'] == 1) {
        echo "<li class='disabled'>";
            echo "<span aria-hidden='true'>&laquo;</span>";
        echo "</li>";
      } else {
        $prev = $data['current_page'] - 1;
        echo "<li>";
          echo "<a href='index.php?controller=admin&resources=user&page=$prev' aria-label='Previous'>";
            echo "<span aria-hidden='true'>&laquo;</span>";
          echo "</a>";
        echo "</li>";
      }

      for($i = 1; $i <= $data['page']; $i++) {
        if ($i == $data['current_page']) {
          echo "<li class='active'><a href='javascript: void(0)'>$i</a></li>";
        } else {
          echo "<li><a href='index.php?controller=admin&resources=user&page=$i'>$i</a></li>";
        }
      }

      if ($data['current_page'] == $data['page']) {
        echo "<li class='disabled'>";
            echo "<span aria-hidden='true'>&raquo;</span>";
        echo "</li>";
      } else {
        $next = $data['current_page'] + 1;
        echo "<li>";
          echo "<a href='index.php?controller=admin&resources=user&page=$next' aria-label='Next'>";
            echo "<span aria-hidden='true'>&raquo;</span>";
          echo "</a>";
        echo "</li>";
      }
      ?>
    </ul>
  </nav>
</div>
<?php
loadview("layouts/footer");
?>
