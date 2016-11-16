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

  public function updateAmount($id, $quantity){
    $this->select("products_amount");
    $data = $this->getEffectById($id);
    $data['products_amount'] += $quantity;
    $input_data = array("products_amount" => $data['products_amount']);
    $this->updateEffect($input_data);
  }

  public function changeAmountWhenEditProduct($old_id, $amount, $new_id){
    $this->select("products_amount");

    $data_old = $this->getEffectById($old_id);
    $data_old['products_amount'] -= $amount;
    $input_data_old = array("products_amount" => $data_old['products_amount']);
    $this->updateEffect($input_data_old);

    $data_new = $this->getEffectById($new_id);
    $data_new['products_amount'] += $amount;
    $input_data_new = array("products_amount" => $data_new['products_amount']);
    $this->updateEffect($input_data_new);
  }

  public function changeAmountWhenUpdateProductAmount($id, $amount, $change){
    $this->select("products_amount");
    $data = $this->getEffectById($id);
    if($change == "up"){
      $data['products_amount'] += $amount;
    }else{
      $data['products_amount'] -= $amount;
    }
    $input_data = array("products_amount" => $data['products_amount']);
    $this->updateEffect($input_data);
  }
}
