<?php
class Model_AddressRegister extends Model{
  protected $_table = "address_registers";

  public function addAddressRegister($data){
    $this->insert($this->_table, $data);
  }

  public function listAddressRegisterByUid($uid){
    $this->where("uid = '$uid'");
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function deleteAddressRegister($id){
    $this->where("addrid = '$id'");
    $this->delete($this->_table);
  }

  public function getAddressRegisterById($id){
    $this->where("addrid = '$id'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function updateAddressRegister($data){
    $this->update($this->_table, $data);
  }
}
