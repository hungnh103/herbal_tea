<?php
class Model_InvoiceDetail extends Model{
  protected $_table = "invoice_details";

  public function addInvoiceDetail($data){
    $this->insert($this->_table, $data);
  }

  public function checkProductExistence($iid, $pid){
    $check_data = array("iid =" => $iid, "pid =" => $pid);
    $this->where($check_data);
    $this->select("idid, quantity");
    $this->getData($this->_table);
    if($this->num_rows() == 1){
      return $this->fetch();
    }else{
      return false;
    }
  }

  public function updateInvoiceDetail($data){
    $this->update($this->_table, $data);
  }

  public function listInvoiceDetail($iid){
    $this->where("iid = '$iid'");
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function getInvoiceDetailById($idid){
    $this->where("idid = '$idid'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function deleteInvoiceDetail($idid){
    $this->where("idid = '$idid'");
    $this->delete($this->_table);
  }
}
