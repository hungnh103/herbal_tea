<?php
class Model_Province extends Model{
  protected $_table = "provinces";

  public function listProvince(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function getProvinceById($id){
    $this->where("provid = '$id'");
    $this->getData($this->_table);
    return $this->fetch();
  }
}
