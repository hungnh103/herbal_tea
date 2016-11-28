<?php
$data = "";
$mquestion = new Model_Question;
$mquestion->order("qid", "DESC");
$data = $mquestion->listQuestion();
if(!empty($data)) {
  $manswer = new Model_Answer;
  $i = 0;
  foreach ($data as $item) {
    if ($item['is_responded'] == "1") {
      $output = $manswer->getAnswerByQid($item['qid']);
      $data[$i]['answer'] = $output['content'];
    } else {
      $data[$i]['answer'] = "";
    }
    $i++;
  }
}

loadview("salesmanager/ask_and_answer/index", $data);
