<?php
class Model_Invoice extends Model{
  protected $_table = "invoices";

  public function addInvoice($data){
    $this->insert($this->_table, $data);
  }

  public function checkAfterLogin($id){
    $check_data = array("uid =" => $id, "status =" => "1");
    $this->where($check_data);
    $this->select("iid, products_amount, total");
    $this->getData($this->_table);
    if($this->num_rows() == "1"){
      return $this->fetch();
    }else{
      return false;
    }
  }

  public function updateInvoice($data){
    $this->update($this->_table, $data);
  }

  public function getInvoiceId($data){
    $this->select("iid");
    $this->where($data);
    $this->getData($this->_table);
    $output = $this->fetch();
    return $output['iid'];
  }

  public function deleteInvoice($iid){
    $this->where("iid = '$iid'");
    $this->delete($this->_table);
  }
}
