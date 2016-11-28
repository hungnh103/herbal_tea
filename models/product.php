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

  public function updateProductAmount($id, $amount, $change){
    $this->select("quantity");
    $data = $this->getProductById($id);
    if($change == "up"){
      $data['quantity'] += $amount;
    }else{
      $data['quantity'] -= $amount;
    }
    $input_data = array("quantity" => $data['quantity']);
    $this->updateProduct($input_data);
  }

  public function updateAfterOrder($pid, $quantity){
    $this->select("quantity, sold, oeid");
    $output = $this->getProductById($pid);
    $output['quantity'] -= $quantity;
    $output['sold'] += $quantity;
    $update_data = array("quantity" => $output['quantity'], "sold" => $output['sold']);
    $this->updateProduct($update_data);
    return $output['oeid'];
  }

  public function updateAfterAcceptRemark($pid, $score){
    $this->select("rating, rating_times");
    $current_status = $this->getProductById($pid);
    $new_times = $current_status['rating_times'] + 1;
    $new_total_score = $current_status['rating_times'] * $current_status['rating'] + $score;
    $new_score = round($new_total_score / $new_times);
    $update_data = array("rating" => $new_score, "rating_times" => $new_times);
    $this->updateProduct($update_data);
  }

  public function searchProduct($keyword){
    $this->select("pid, name, price, image");
    $this->where("name LIKE '%$keyword%'");
    $this->getData($this->_table);
    return $this->fetchAll();
  }
}
