<div id="news_form">
  <?php
  if(isset($data['news'])) {
    echo "<form action='index.php?controller=salesmanager&resources=news&action=edit&nid=".$data['news']['nid']."' method='post' enctype='multipart/form-data'>";
  } else {
    echo "<form action='index.php?controller=salesmanager&resources=news&action=new' method='post' enctype='multipart/form-data'>";
  }
  ?>
    <table>
      <tr>
        <td>Tiêu đề</td>
        <td><input type="text" name="title" class="form-control" <?php if(isset($data['news'])) echo "value='".$data['news']['title']."';" ?>></td>
      </tr>
      <?php
      if(isset($data['news'])) {
        echo "<tr>";
          echo "<td>Ảnh minh hoạ</td>";
          echo "<td><img src='assets/images/news/".$data['news']['poster']."' style='width: 315px; height: 150px;'></td>";
        echo "</tr>";
        echo "<tr>";
          echo "<td>Chọn ảnh khác</td>";
          echo "<td><input type='file' name='image'></td>";
        echo "</tr>";
      } else {
        echo "<tr>";
          echo "<td>Ảnh minh hoạ</td>";
          echo "<td><input type='file' name='image'></td>";
        echo "</tr>";
      }
      ?>
      <tr>
        <td>Nội dung</td>
        <td>
          <textarea cols="80" rows="15" name="content" class="form-control" style="resize: none;"><?php if (isset($data['news'])) echo $data['news']['content']; ?></textarea>
        </td>
      </tr>
      <script type="text/javascript">
        CKEDITOR.replace("content");
      </script>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="<?php if(isset($data['news'])){ echo "Chỉnh sửa bài viết"; } else { echo "Thêm bài viết mới"; } ?>" class="btn btn-primary"></td>
      </tr>
    </table>
  </form>

  <div class="error">
    <?php
    if(!empty($data['error'])) {
      echo "<ul>";
      foreach ($data['error'] as $item) {
        echo "<li>$item</li>";
      }
      echo "</ul>";
    }
    ?>
  </div>
</div>
