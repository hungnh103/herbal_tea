<?php
class Model_Effect extends Model{
  protected $_table = "outstanding_effects";

  public function addEffect($data){
    $this->insert($this->_table, $data);
  }

  public function listEffect(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function deleteEffect($id){
    $this->where("oeid = '$id'");
    $this->delete($this->_table);
  }

  public function checkEffect($data = ""){
    if(is_array($data)){
      $this->where($data);
    }
    $this->getData($this->_table);
    if($this->num_rows() == 1){
      return false;
    }else{
      return true;
    }
  }

  public function getEffectById($id){
    $this->where("oeid = '$id'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function updateEffect($data){
    $this->update($this->_table, $data);
  }
}
