<?php
$data = "";
$mquestion = new Model_Question;
$mquestion->where("is_responded = '1'");
$mquestion->order("qid", "DESC");
$data['qanda'] = $mquestion->listQuestion();

if(!empty($data['qanda'])) {
  $manswer = new Model_Answer;
  $i = 0;
  foreach ($data['qanda'] as $item) {
    $answer_info = $manswer->getAnswerByQid($item['qid']);
    $data['qanda'][$i]['answer'] = $answer_info['content'];
    $i++;
  }
}

$data['title_tag'] = "Hỏi đáp - Tư vấn sức khoẻ";
loadview("ask_and_answer/index", $data);
