<?php
if(isset($_POST['ok'])) {
  $question = $_POST['question'];
  $input_data = array("content" => $question);
  $mquestion = new Model_Question;
  $mquestion->addQuestion($input_data);
  redirect("ask_and_answer/index");
}
