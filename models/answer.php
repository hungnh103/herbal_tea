<?php
class Model_Answer extends Model{
  protected $_table = "answers";

  public function getAnswerByQid($qid){
    $this->where("qid = '$qid'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function addAnswer($data){
    $this->insert($this->_table, $data);
  }
}
