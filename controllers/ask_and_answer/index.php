<?php
$data = "";
$mquestion = new Model_Question;
$mquestion->where("is_responded = '1'");
$mquestion->order("qid", "DESC");
$data = $mquestion->listQuestion();

if(!empty($data)) {
  $manswer = new Model_Answer;
  $i = 0;
  foreach ($data as $item) {
    $answer_info = $manswer->getAnswerByQid($item['qid']);
    $data[$i]['answer'] = $answer_info['content'];
    $i++;
  }
}

loadview("ask_and_answer/index", $data);
