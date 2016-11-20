<script type="text/javascript">
  $(document).ready(function(){
    $("#province").change(function(){
      provid = $(this).val();
      $.ajax({
        url:"index.php?controller=user&resources=address&action=list_district_ajax",
        type:"get",
        data:"provid="+provid,
        async:true,
        success:function(result){
          $("#district").html(result);
        }
      });
    });

    $("#district").change(function(){
      distid = $(this).val();
      $.ajax({
        url:"index.php?controller=user&resources=address&action=list_commune_ajax",
        type:"get",
        data:"distid="+distid,
        async:true,
        success:function(result){
          $("#commune").html(result);
        }
      });
    });
  });
</script>

<div id="create_edit_addr">
  <a href="index.php?controller=user&uid=<?php echo $_SESSION['uid']; ?>" class="btn btn-info" style="position: absolute; top: 33px; left: 20px; padding: 3px;">← Tài khoản</a>
  <div id="addr_form">
    <?php
    if($_GET['action'] == "new") {
      echo "<p style='font-weight: bold; font-size: 11pt; margin-left: 150px;'>Tạo địa chỉ mới</p>";
      echo "<form action='index.php?controller=user&resources=address&action=new&uid=$_SESSION[uid]' method='post'>";
    } else {
      echo "<p style='font-weight: bold; font-size: 11pt; margin-left: 150px;'>Chỉnh sửa địa chỉ</p>";
      echo "<form action='index.php?controller=user&resources=address&action=edit&addrid=".$data['addr']['addrid']."' method='post'>";
    }
    ?>
      <table>
        <tr>
          <td style="width: 110px;">Họ và tên</td>
          <td style="width: 300px;">
            <input type="text" name="fullname" class="form-control" <?php if(isset($data['addr'])) echo "value='".$data['addr']['fullname']."'"; ?>>
          </td>
        </tr>
        <tr>
          <td>Số điện thoại</td>
          <td>
            <input type="text" name="telephone" class="form-control" <?php if(isset($data['addr'])) echo "value='".$data['addr']['telephone']."'"; ?>>
          </td>
        </tr>
        <tr>
          <td>Tỉnh/Thành</td>
          <td>
            <select class="form-control" name="province" id="province">
              <option value="0">Chọn Tỉnh/Thành phố</option>
              <?php
              foreach ($data['province'] as $item) {
                if (isset($data['addr']) && ($data['addr']['provid'] == $item['provid'])){
                  echo "<option value='$item[provid]' selected='selected'>$item[name]</option>";
                } else {
                  echo "<option value='$item[provid]'>$item[name]</option>";
                }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Quận/Huyện</td>
          <td>
            <select class="form-control" name="district" id="district">
              <option value="0">Chọn Quận/Huyện</option>
              <?php
              if(isset($data['district'])) {
                foreach ($data['district'] as $item) {
                  if ($data['addr']['distid'] == $item['distid']){
                    echo "<option value='$item[distid]' selected='selected'>$item[name]</option>";
                  } else {
                    echo "<option value='$item[distid]'>$item[name]</option>";
                  }
                }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Xã/Phường</td>
          <td>
            <select class="form-control" name="commune" id="commune">
              <option value="0">Chọn Xã/Phường</option>
              <?php
              if(isset($data['commune'])) {
                foreach ($data['commune'] as $item) {
                  if ($data['addr']['commid'] == $item['commid']) {
                    echo "<option value='$item[commid]' selected='selected'>$item[name]</option>";
                  } else {
                    echo "<option value='$item[commid]'>$item[name]</option>";
                  }
                }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Địa chỉ</td>
          <td>
            <textarea cols="30" rows="3" name="address" class="form-control" style="resize: none;"><?php if(isset($data['addr'])) echo $data['addr']['address']; ?></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="ok" value="<?php if($_GET['action'] == "new"){ echo "Thêm địa chỉ"; } else { echo "Cập nhật"; } ?>" class="btn btn-primary">
          </td>
        </tr>
      </table>
    </form>
  </div>

  <div class="error">
    <?php
    if(!empty($data['error'])){
      echo "<ul>";
      foreach ($data['error'] as $err){
        echo "<li>$err</li>";
      }
      echo "</ul>";
    }
    ?>
  </div>
</div>
