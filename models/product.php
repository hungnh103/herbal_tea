<?php
class Model_Product extends Model{
  protected $_table = "products";

  public function addProduct($data){
    $this->insert($this->_table, $data);
  }

  public function listProduct(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function deleteProduct($id){
    $this->where("pid = '$id'");
    $this->delete($this->_table);
  }

  public function getProductById($id){
    $this->where("pid = '$id'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function checkProduct($data = ""){
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

  public function updateProduct($data){
    $this->update($this->_table, $data);
  }
}
