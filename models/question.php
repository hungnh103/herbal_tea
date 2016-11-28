<?php
class Model_Question extends Model{
  protected $_table = "questions";

  public function addQuestion($data){
    $this->insert($this->_table, $data);
  }

  public function listQuestion(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function getQuestionByQid($qid){
    $this->where("qid = '$qid'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function updateQuestion($data){
    $this->update($this->_table, $data);
  }
}
