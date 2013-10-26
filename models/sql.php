<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lungu
 * Date: 9/28/13
 * Time: 6:05 AM
 * To change this template use File | Settings | File Templates.
 */

class Model_Sql{

  /**
   * @var
   */
  protected static $_instance;

  /**
   * @var
   */
  private $_connection;

  /**
   * @return Model_Sql
   */
  public static function getInstance(){
    if(self::$_instance == null)
      self::$_instance = new self;

    return self::$_instance;
  }

  /**
   *
   */
  public function __construct(){
    $this->_connection = new mysqli(
      Model_Constants::SQL_HOST,
      Model_Constants::SQL_USER,
      Model_Constants::SQL_PASS,
      Model_Constants::SQL_DB);

    if($this->_connection->connect_error)
      throw new Exception(
        "[SQL ERROR][%d] Connection error:%s",
        $this->_connection->connect_errno,
        $this->_connection->connect_error
      );
  }

  /**
   * @Example:
   *  Model_Sql::getInstance()->select(
  'users',//table name
  `user_id`,`user_name`,//for example
  array(
  'user_name' => $username
  )
   * @param $table
   * @param string $rows
   * @param null $orderrow
   * @param string $where
   * @param null $limit
   * @return array
   */
  public function select($table,$rows = '*',$where = array(),$orderrow=null,$limit = null,$offset = null){
    if(empty($where)){
      if(is_null($orderrow)){
        if(is_null($limit) && is_null($offset))
          $query = $this->_connection->query("SELECT ".$rows." FROM ".$table." ");
        else
          $query = $this->_connection->query("SELECT ".$rows." FROM ".$table." ORDER BY `".$orderrow."` DESC LIMIT ".$limit.",".$offset." ");
      }else
        if(is_null($limit) && is_null($offset))
          $query = $this->_connection->query("SELECT ".$rows." FROM ".$table." ORDER BY `".$orderrow."` DESC  ");
        else
          $query = $this->_connection->query("SELECT ".$rows." FROM ".$table." ORDER BY `".$orderrow."` DESC LIMIT ".$limit.",".$offset." ");
    }else{
      foreach($where as $row => $value){
        $sql = " `".$row."`='".$this->_connection->real_escape_string($value)."' AND";
      }
      if(!is_null($orderrow))
        $query = $this->_connection->query("SELECT ".$rows." FROM ".$table." WHERE (".rtrim($sql,'AND').") ORDER BY `".$orderrow."` DESC ");
       else
        $query = $this->_connection->query("SELECT ".$rows." FROM ".$table." WHERE (".rtrim($sql,'AND').")");
      }

    $results = array();
    while($row = $query->fetch_assoc()){
      $results[] = $row;
    }
    return $results;
  }

  /**
   * @param $table
   * @param array $rows
   * @return bool
   */
  public function insert($table,$rows = array()){
    $r = '';
    $v = '';
    foreach($rows as $row => $value){
      $r .= " `".$row."`,";
      $v .= "'".$this->_connection->real_escape_string($value)."',";
    }
    $sql = "INSERT INTO `".$table."`(".rtrim($r,',').") VALUES(".rtrim($v,',').")";
    if($this->_connection->query($sql))
      return true;
    else
      return false;
  }

  /**
   * @param $table
   * @param array $rows
   * @param array $where
   * @return bool
   */
  public function update($table,$rows = array(),$where = array()){
    $sql = '';
    foreach($rows as $row => $value){
      $sql .= "`".$row."`='".$this->_connection->real_escape_string($value)."' ,";
    }
    if(empty($where))
      $sql = "UPDATE `".$table."` SET ".rtrim($sql,",")." ";
    else{
      $w = '';
      foreach($where as $r => $v){
        $w .= "`".$r."`='".$this->_connection->real_escape_string($v)."',";
      }
      $sql = "UPDATE `".$table."` SET ".rtrim($sql,",")."WHERE ".rtrim($w,",")."";
    }


    if($this->_connection->query($sql))
      //echo 'd';
      return true;
    else
      //echo 'n';
      return false;
  }

  /**
   * @param $table
   * @param array $where
   * @return bool
   */
  public function delete($table,$where = array()){
    if(!is_array($where)){
      $query = $this->_connection->query("DELETE FROM `".$table."` WHERE ".$where." ");
    }else{
      foreach($where as $row => $value){
        $sql = " `".$row."`='".$value."' AND";
      }
      $query = $this->_connection->query("DELETE FROM `".$table."` WHERE (".rtrim($sql,'AND').")");
    }
    if($query)
      return true;
    else
      return false;
  }

  /**
   * @param $table
   * @param array $where
   * @return mixed
   */
  public function count_rows($table,$where = array()){
    if(empty($where))
      $query = $this->_connection->query("SELECT COUNT(*) FROM ".$table."");
    else{
      foreach($where as $row => $value){
        $sql = " `".$row."`='".$value."' AND";
      }
      $query = $this->_connection->query("SELECT COUNT(*) FROM ".$table."  WHERE (".rtrim($sql,'AND').") ");
    }
    return $query->fetch_row();
  }

  /**
   * @param $table
   * @param $row
   * @param $between1
   * @param $between2
   * @return array
   */
  public function search_between($table,$row,$between1,$between2){
    //select * from table where date_column between "2001-01-05" and "2001-01-10
    $query = $this->_connection->query("SELECT * FROM `".$table."` WHERE `".$row."` BETWEEN '".$between1."' AND '".$between2."' ");
    $results = array();
    while($row = $query->fetch_assoc()){
      $results[] = $row;
    }

    return $results;
  }

  /**
   * @param $table
   * @param $row
   * @param $value
   * @return array
   */
  public function like($table,$row,$value){
    //select * from table where date_column between "2001-01-05" and "2001-01-10
    $query = $this->_connection->query("SELECT * FROM `".$table."` WHERE `".$row."` LIKE '%".$value."%' ");
    $results = array();
    while($row = $query->fetch_assoc()){
      $results[] = $row;
    }

    return $results;
  }

  public function limit($table,$rows = '*',$where = array(),$row,$limit,$offset){
    if(empty($where)){
       $query = $this->_connection->query("SELECT ".$rows." FROM ".$table." ORDER BY `".$row."` DESC LIMIT ".$limit.",".$offset."");
    }else{
      foreach($where as $row => $value){
        $sql = " `".$row."`='".$this->_connection->real_escape_string($value)."' AND";
      }
        $query =
          $this->_connection->query(
            "SELECT ".$rows." FROM ".$table."
            WHERE (".rtrim($sql,'AND').")
            DESC
            LIMIT ".$limit.",".$offset." ");
    }

    $results = array();
    while($row = $query->fetch_assoc()){
      $results[] = $row;
    }
    return $results;
  }
}
