<?php
class Model_Remark extends Model{
  protected $_table = "remarks";

  public function addRemark($data){
    $this->insert($this->_table, $data);
  }

  public function getRemarkByPid($pid){
    $this->where("pid = '$pid'");
    $this->getData($this->_table);
    return $this->fetchAll();
  }
}
