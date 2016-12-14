<?php
$data = "";
$mquestion = new Model_Question;
$mquestion->order("qid", "DESC");
$data['data'] = $mquestion->listQuestion();
if(!empty($data['data'])) {
  $manswer = new Model_Answer;
  $i = 0;
  foreach ($data['data'] as $item) {
    if ($item['is_responded'] == "1") {
      $output = $manswer->getAnswerByQid($item['qid']);
      $data['data'][$i]['answer'] = $output['content'];
    } else {
      $data['data'][$i]['answer'] = "";
    }
    $i++;
  }
}

$data['title_tag'] = "Hỏi đáp";
loadview("salesmanager/ask_and_answer/index", $data);
