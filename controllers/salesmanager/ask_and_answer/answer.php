<?php
$qid = $_GET['qid'];
$mquestion = new Model_Question;
$data['question'] = $mquestion->getQuestionByQid($qid);

if(isset($_POST['ok'])) {
  $answer = $_POST['reply'];
  $manswer = new Model_Answer;
  $input_data = array("content" => $answer, "qid" => $qid);
  $manswer->addAnswer($input_data);

  $update_question = array("is_responded" => "1");
  $mquestion->updateQuestion($update_question);
  redirect("index.php?controller=salesmanager&resources=ask_and_answer");
}

$data['title_tag'] = "Trả lời khách hàng";
loadview("salesmanager/ask_and_answer/answer", $data);
