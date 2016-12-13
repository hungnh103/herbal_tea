<?php
loadview("layouts/simple_header", $data);
loadview("salesmanager/nav_bar");
?>

<div id="reply_question">
  <form action="index.php?controller=salesmanager&resources=ask_and_answer&action=answer&qid=<?php echo $data['question']['qid']; ?>" method="post">
    <table style="margin: 0;">
      <tr>
        <td><b>Câu hỏi</b></td>
        <td><?php echo $data['question']['content']; ?></td>
      </tr>
      <tr>
        <td><b>Câu trả lời</b></td>
        <td>
          <textarea cols="70" rows="7" name="reply" class="form-control" style="resize: none;" required="required"></textarea>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="ok" value="Trả lời" class="btn btn-primary"></td>
      </tr>
    </table>
  </form>
</div>

<?php
loadview("layouts/footer");
?>
