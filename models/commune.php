<?php
class Model_Commune extends Model{
  protected $_table = "communes";

  public function listCommuneByDistid($distid){
    $this->where("distid = '$distid'");
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function getCommuneById($id){
    $this->where("commid = '$id'");
    $this->getData($this->_table);
    return $this->fetch();
  }
}
