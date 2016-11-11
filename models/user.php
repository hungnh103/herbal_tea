<?php
class Model_User extends Model{
  protected $_table = "users";

  public function addUser($data){
    $this->insert($this->_table, $data);
  }

  public function checkUser(){
    $this->getData($this->_table);
    if($this->num_rows() == 1){
      return false;
    }else{
      return true;
    }
  }
}
