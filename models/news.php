<?php
class Model_News extends Model{
  protected $_table = "news";

  public function addNews($data){
    $this->insert($this->_table, $data);
  }

  public function listNews(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function deleteNews($nid){
    $this->where("nid = '$nid'");
    $this->delete($this->_table);
  }

  public function getNewsByNid($nid){
    $this->where("nid = '$nid'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function udpateNews($data){
    $this->update($this->_table, $data);
  }
}
