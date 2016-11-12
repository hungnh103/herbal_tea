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

  public function listUser(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function deleteUser($id){
    $this->where("uid = '$id'");
    $this->delete($this->_table);
  }

  public function updateUser($data){
    $this->update($this->_table, $data);
  }
}
