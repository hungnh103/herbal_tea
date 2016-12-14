<?php
loadview("layouts/simple_header", $data);
loadview("salesmanager/nav_bar");
?>
<script type="text/javascript">
  function check_delete_news(){
    if (!window.confirm("Bạn chắc chắn muốn xoá bài viết này?")) return false;
  }
</script>

<div id="news_list">
  <a href="index.php?controller=salesmanager&resources=news&action=new" class="btn btn-success" style="margin-bottom: 20px;">Thêm bài viết mới</a>
  <table class="table table-hover table-bordered" style="width: 700px;">
    <thead>
      <tr>
        <th style="width: 50px;">STT</th>
        <th style="width: 160px;">Ngày đăng bài</th>
        <th>Tiêu đề</th>
        <th style="width: 50px;">Sửa</th>
        <th style="width: 50px;">Xoá</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if (empty($data['news'])) {
      echo "<tr>";
        echo "<td colspan='5'>Chưa có bài viết nào</td>";
      echo "</tr>";
    } else {
      $stt = 1;
      foreach ($data['news'] as $item) {
        echo "<tr>";
          echo "<td>$stt</td>";
          $timestamp = strtotime($item['created_at']);
          echo "<td>".date("H:i", $timestamp)." ngày ".date("d/m/Y", $timestamp)."</td>";
          echo "<td>$item[title]</td>";
          echo "<td><a href='index.php?controller=salesmanager&resources=news&action=edit&nid=$item[nid]'><span class='icon_edit'></span></a></td>";
          echo "<td><a href='index.php?controller=salesmanager&resources=news&action=destroy&nid=$item[nid]' onclick='return check_delete_news();'><span class='icon_delete'></span></a></td>";
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
