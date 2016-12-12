<?php
class Model_Remark extends Model{
  protected $_table = "remarks";

  public function addRemark($data){
    $this->insert($this->_table, $data);
  }

  public function getRemarkByPid($pid){
    $condition = array("pid=" => $pid, "is_approved=" => "1");
    $this->where($condition);
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function listRemark(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function updateRemark($data){
    $this->update($this->_table, $data);
  }

  public function getRemarkByRemid($remid){
    $this->where("remid = '$remid'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function countRemarkByUid($uid) {
    $this->where("uid = '$uid'");
    $this->getData($this->_table);
    return $this->num_rows();
  }
}
