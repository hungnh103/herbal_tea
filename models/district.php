<?php
class Model_District extends Model{
  protected $_table = "districts";

  public function listDistrictByProvid($provid){
    $this->where("provid = '$provid'");
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function getDistrictById($id){
    $this->where("distid = '$id'");
    $this->getData($this->_table);
    return $this->fetch();
  }
}
