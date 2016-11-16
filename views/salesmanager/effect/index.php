<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<script type="text/javascript">
  function check_delete(){
    if(!window.confirm("Chắc chắn muốn xoá công dụng này?")){
      return false;
    }
  }
</script>

<div id="effects_list">
  <a href="index.php?controller=salesmanager&resources=effect&action=new" class="btn btn-success">Thêm</a>
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th class="index">STT</th>
        <th class="effect_name">Tên công dụng</th>
        <th class="products_amount">Số lượng sản phẩm</th>
        <th class="edit">Sửa</th>
        <th class="del">Xoá</th>
      </tr>
    </thead>

    <tbody>
      <?php
      if($data['data'] == ""){
        echo "<tr>";
          echo "<td colspan='5'>Chưa có dữ liệu</td>";
        echo "</tr>";
      }else{
        $stt = 1;
        foreach($data['data'] as $item){
          echo "<tr>";
            echo "<td>$stt</td>";
            echo "<td>$item[content]</td>";
            echo "<td>".number_format($item['products_amount'])."</td>";
            echo "<td><a href='index.php?controller=salesmanager&resources=effect&action=edit&oeid=$item[oeid]'><span class='icon_edit'></span></a></td>";
            if($item['oeid'] == 1){
              echo "<td>&nbsp;</td>";
            }else{
              echo "<td><a href='index.php?controller=salesmanager&resources=effect&action=destroy&oeid=$item[oeid]' onclick='return check_delete();'><span class='icon_delete'></span></a></td>";
            }
          echo "</tr>";

          $stt++;
        }
      }
      ?>
    </tbody>
  </table>
</div>
<?php
loadview("layouts/footer");
?>
