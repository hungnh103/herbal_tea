<?php
loadview("layouts/header", $data);
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#ask_and_answer #aaa_left table tr:last-child td").css("border-bottom", "none");
  });
</script>

<div id="ask_and_answer" style="width: 1000px; margin: auto; min-height: 257px;">
  <div id="aaa_left">
    <table>
    <?php
    if (empty($data['qanda'])) {
      echo "<tr>";
        echo "<td>Chưa có câu hỏi nào</td>";
      echo "</tr>";
    } else {
      foreach ($data['qanda'] as $item) {
        echo "<tr>";
          echo "<td>";
            echo "<p><span style='font-weight: bold;'>Hỏi:</span> $item[content]</p>";
            echo "<p><span style='font-weight: bold;'>Trả lời:</span><br>$item[answer]</p>";
          echo "</td>";
        echo "</tr>";
      }
    }
    ?>
    </table>
  </div>

  <div id="aaa_right">
    <p style="font-weight: bold; font-size: 12pt;">Vui lòng đặt câu hỏi của bạn tại đây:</p>
    <p><i>(Chúng tôi sẽ phản hồi câu hỏi của bạn trong thời gian sớm nhất có thể)</i></p>
    <form action='index.php?controller=ask_and_answer&action=new' method='post'>
      <textarea cols="20" rows="6" name="question" required="required" class="form-control" style="resize: none;" placeholder="Viết câu hỏi của bạn..."></textarea>
      <input type="submit" name="ok" value="Gửi" class="btn btn-primary" style="margin: 10px 0 0 237px; padding: 3px 20px;">
    </form>
  </div>
</div>

<?php
loadview("layouts/footer");
?>
