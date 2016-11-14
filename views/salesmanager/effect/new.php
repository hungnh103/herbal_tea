<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<div id="add_effect_interface">
  <form action="index.php?controller=salesmanager&resources=effect&action=new" method="post">
    <table>
      <tr>
        <td style="font-size: 11pt;">Tên công dụng</td>
        <td style="width: 400px;"><input type="text" name="txteffect" class="form-control" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Thêm" class="btn btn-primary" name="ok" /></td>
      </tr>
    </table>

    <?php
    if(!empty($data['error'])){
      echo "<div class='error'>";
        echo "<ul>";
        foreach($data['error'] as $err){
          echo "<li>$err</li>";
        }
        echo "</ul>";
      echo "</div>";
    }
    ?>
  </form>
</div>
<?php
loadview("layouts/footer");
?>
