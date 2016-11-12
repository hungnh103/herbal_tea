<?php
class Database{
  protected $_hostname = "localhost";
  protected $_userhost = "root";
  protected $_passhost = "";
  protected $_dbname = "herbal_tea";
  protected $_conn;
  protected $_result;

  public function connect(){
    $this->_conn = mysql_connect($this->_hostname, $this->_userhost, $this->_passhost);
    mysql_select_db($this->_dbname, $this->_conn);
  }

  public function disconnect(){
    if($this->_conn){
      mysql_close($this->_conn);
    }
  }

  public function query($sql){
    $this->_result = mysql_query($sql);
  }

  public function num_rows(){
    if($this->_result){
      $row = mysql_num_rows($this->_result);
    }else{
      $row = 0;
    }
    return $row;
  }

  public function fetch(){
    if($this->_result){
      $data = mysql_fetch_assoc($this->_result);
    }else{
      $data = "";
    }
    return $data;
  }

  public function fetchAll(){
    $data = "";
    if($this->_result){
      while($row = $this->fetch()){
        $data[] = $row;
      }
    }
    return $data;
  }
}

// ****************************************** //
class Model extends Database{
  protected $_select = "*";
  protected $_where;
  protected $_order;

  public function __construct(){
    $this->connect();
  }

  public function select($col){
    if(!empty($col)){
      $this->_select = $col;
    }
  }

  public function where($where){
    if(is_array($where)){
      foreach($where as $k => $v){
        $arr[] = "$k '$v'";
      }
      $condition = implode(" AND ", $arr);
      $this->_where = "WHERE $condition";
    }else{
      $this->_where = "WHERE $where";
    }
  }

  public function order($col, $type = "ASC"){
    if(!empty($col)){
      $this->_order = "ORDER BY $col $type";
    }
  }

  // bat dau cai dat cac cau truy van
  // ********************************
  // ********************************
  public function insert($table, $data){
    $column = implode(", ", array_keys($data));
    $value = array_values($data);
    foreach($value as $item){
      $new_value[] = "'$item'";
    }
    $insert_value = implode(", ", $new_value);
    $sql = "INSERT INTO $table($column) VALUES($insert_value)";
    $this->query($sql);
  }

  public function getData($table){
    $sql = "SELECT $this->_select FROM $table $this->_where $this->_order";
    $this->query($sql);
  }

  public function delete($table){
    $sql = "DELETE FROM $table $this->_where";
    $this->query($sql);
  }

  public function update($table, $data){
    foreach($data as $k => $v){
      $arr[] = "$k = '$v'";
    }
    $condition = implode(", ", $arr);
    $sql = "UPDATE $table SET $condition $this->_where";
    $this->query($sql);
  }
}
