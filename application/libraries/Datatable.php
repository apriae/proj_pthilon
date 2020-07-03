<?php defined('BASEPATH') OR exit('No direct script access allowed');

$lib_dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . "datatable";

require_once($lib_dir . "/ssp.class.php");

class Datatable {

  public $CI;

  private $_columns = array();
  private $_db_conn = array();

  public function __construct()
  {
    $this->CI =& get_instance();

    if(!empty($db_name))
    {
      $this->CI->load->database($db_name);
    }
    else
    {
      $this->CI->load->database();
    }

    // Set DB
    $this->_db_conn = array(
        'user' => $this->CI->db->username,
        'pass' => $this->CI->db->password,
        'db'   => $this->CI->db->database,
        'host' => $this->CI->db->hostname
    );
  }

  public function set_columns($columns)
  {
    $this->_columns = $columns;
  }

  public function generate($config)
  {
    if(is_array($config))
    {
      if(isset($config["database"]))
      {
        $this->_db_conn["db"] = $config["database"];
      }

      if(!isset($config["table"]))
      {
        exit("fatal error : Missing table!!!");
      }
      else
      {
        $table = $config["table"];
      }
      $columns = isset($config["columns"]) ? $config["columns"] : array();

      // $where_result = array("column_name = value")
      $where_result = isset($config["where_result"]) ? $config["where_result"] : array();

      // $where_all = array("column_name = value")
      $where_all = isset($config["where_all"]) ? $config["where_all"] : array();

      // $column_format = array("column_name" => "format_type");
      $column_format = isset($config["column_format"]) ? $config["column_format"] : array();
    }
    else
    {
      $table = $config;
      $columns = array();
      $where_result = array();
      $where_all = array();
    }

    // Set DB
    $db = $this->CI->load->database($this->_db_conn["db"], TRUE);
    // Get Primary Key
    $fd = $db->field_data($table);

    $_pk = "";

    $_f1 = $fd[0];
    $_fc = $_f1->name;
    foreach ($fd as $f)
    {
      if($f->primary_key)
      {
        $_pk = $f->name;

        break;
      }
    }
    if($_pk != "")
    {
      $primaryKey = $_pk;
    }
    else
    {
      $primaryKey = $_fc;
    }

    if(count($columns) == 0)
    {
      $columns = array();
      $fd = $db->field_data($table);
      foreach ($fd as $f)
      {
        $column["db"] = $f->name;
        $column["dt"] = $f->name;

        if(isset($column_format[$f->name]))
        {
          $f->type =  [$f->name];
        }

        switch ($f->type)
        {
          case 'double':
            $column["formatter"] = function( $d, $row ) {
              if(is_numeric($d)) return number_format($d);

              return $d;
            };
            break;
          case 'decimal':
            $column["formatter"] = function( $d, $row ) {
              if(is_numeric($d)) return number_format($d);

              return $d;
            };
            break;
          default:
            $column["db"] = $f->name;
            $column["dt"] = $f->name;
            break;
        }
        $columns[] = $column;
      }
    }

    $response = SSP::complex( $_GET, $this->_db_conn, $table, $primaryKey, $columns, $where_result, $where_all);

    header('Content-Type: application/json');
    print json_encode($response);
    exit();
  }
}
