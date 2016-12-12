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

  public function getInvoiceByUid($uid){
    $this->where("uid = '$uid'");
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function getInvoiceByIid($iid){
    $this->where("iid = '$iid'");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function listInvoice(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function updateInvoiceStatus($iid){
    $this->select("status");
    $status = $this->getInvoiceByIid($iid);
    $status['status'] += 1;
    $update_data = array("status" => $status['status']);
    $this->updateInvoice($update_data);
  }

  public function countInvoiceByUid($uid) {
    $this->where("uid = '$uid'");
    $this->getData($this->_table);
    return $this->num_rows();
  }

  public function statInvoice() {
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function currentMonthTotal() {
    $year = date("Y");
    $month = date("m");
    $condition = array(
        "year(order_date) =" => $year,
        "month(order_date) =" => $month,
        "status =" => "4"
      );
    $this->where($condition);
    $this->getData($this->_table);
    return $this->fetch();
  }
}
