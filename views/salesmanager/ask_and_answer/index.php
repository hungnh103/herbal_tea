<?php
loadview("layouts/simple_header");
loadview("salesmanager/nav_bar");
?>

<div id="question_answer_list">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width: 60px;">STT</th>
        <th style="width: 110px;">Thời điểm hỏi</th>
        <th style="width: 300px;">Câu hỏi</th>
        <th>Câu trả lời</th>
        <th style="width: 70px;">Trả lời</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if(empty($data)) {
      echo "<tr>";
        echo "<td colspan='5'>Chưa có dữ liệu</td>";
      echo "</tr>";
    } else {
      $stt = 1;
      foreach ($data as $item) {
        echo "<tr>";
          echo "<td>$stt</td>";
          $timestamp = date("d/m/Y", strtotime($item['created_at']));
          echo "<td>$timestamp</td>";
          echo "<td style='text-align: justify;'>$item[content]</td>";
          if (empty($item['answer'])) {
            echo "<td>N/A</td>";
            echo "<td><a href='index.php?controller=salesmanager&resources=ask_and_answer&action=answer&qid=$item[qid]'><span class='reply'></span></a></td>";
          } else {
            echo "<td style='text-align: justify;'>$item[answer]</td>";
            echo "<td></td>";
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
