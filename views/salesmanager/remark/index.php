<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>
<script type="text/javascript">
  function update_remark(){
    if(!window.confirm("Bạn chắc chắn chấp nhận bình luận này?")) return false;
  }

  function reject_remark(){
    if(!window.confirm("Bạn chắc chắn muốn huỷ bình luận này?")) return false;
  }
</script>

<div id="remarks_list">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width: 50px;">STT</th>
        <th style="width: 90px; padding-bottom: 8px;">Thời điểm bình luận</th>
        <th style="width: 160px;">Sản phẩm</th>
        <th style="width: 72px;">Đánh giá</th>
        <th>Nội dung</th>
        <th style="width: 85px;">Trạng thái</th>
        <th style="width: 90px;">Duyệt</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if(empty($data)) {
      echo "<tr>";
        echo "<td colspan='7'>Chưa có đánh giá nào từ phía người dùng</td>";
      echo "</tr>";
    } else {
      $stt = 1;
      foreach ($data as $item) {
        echo "<tr>";
          echo "<td>$stt</td>";
          echo "<td>".date("d/m/Y", strtotime($item['created_at']))."</td>";
          echo "<td>$item[product_name]</td>";
          $score = $item['rating'];
          switch ($score) {
            case "1": echo "<td><span class='one_star'>1 sao</span></td>"; break;
            case "2": echo "<td><span class='two_star'>2 sao</span></td>"; break;
            case "3": echo "<td><span class='three_star'>3 sao</span></td>"; break;
            case "4": echo "<td><span class='four_star'>4 sao</span></td>"; break;
            case "5": echo "<td><span class='five_star'>5 sao</span></td>"; break;
          }
          echo "<td style='text-align: justify;'>$item[content]</td>";
          $status = $item['is_approved'];
          switch ($status) {
            case "0":
              echo "<td><span class='pending_remark'>chờ duyệt</span></td>";
              echo "<td><a href='index.php?controller=salesmanager&resources=remark&action=accept&remid=$item[remid]' onclick='return update_remark();'><span class='icon_accept'></span></a><a href='index.php?controller=salesmanager&resources=remark&action=cancel&remid=$item[remid]' onclick='return reject_remark();'><span class='icon_abort'></span></a></td>";
              break;
            case "1":
              echo "<td><span class='accepted_remark'>đã duyệt</span></td>";
              echo "<td></td>";
              break;
            case "2":
              echo "<td><span class='canceled_remark'>huỷ</span></td>";
              echo "<td></td>";
              break;
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
