<?php

namespace App\ParseIt\drivers;

class Database
{
  var $host = 'localhost';
  var $port = '3306';
  var $username;
  var $password;
  var $database;
  var $encoding = 'UTF8';
  var $pconnect = false;
  var $db;

  /**
   *
   */
  function connect()
  {
    $this->db = mysqli_connect($this->host , $this->username, $this->password, $this->database, $this->port);
    if (!$this->db) {
      trigger_error("Could not connect to database: " . mysqli_connect_error(), E_USER_ERROR);
    }
    if ($this->encoding != "") {
      $this->sql("SET NAMES " . $this->encoding);
    }
  }

  /**
   * @param $query
   *
   * @return resource
   */
  function sql($query)
  {
    if (!$this->db) {
      $this->connect();
    }
    $res = mysqli_query($this->db,$query);
    if (mysqli_errno($this->db) > 0) {
      trigger_error("Error in SQL query: \"$query\" " . mysqli_errno($this->db) . " " . mysqli_error($this->db), E_USER_WARNING);
    }
    return $res;
  }

  /**
   * @param $query
   *
   * @return resource
   */
  function query($query)
  {
    return $this->sql($query);
  }

  /*
   * Cannot be used with SELECT !!!
   */
  function multi_sql($query)
  {
    if (!$this->db) {
      $this->connect();
    }
    $res = mysqli_multi_query($this->db,$query);
    if (mysqli_errno($this->db) > 0) {
      trigger_error("Error in SQL query: \"$query\" " . mysqli_errno($this->db) . " " . mysqli_error($this->db), E_USER_WARNING);
    }
    while (mysqli_next_result($this->db)) {;} // flush multi_queries
    return $res;
  }

  function multi_query($query)
  {
    return $this->multi_sql($query);
  }


  /**
   * @param $res
   *
   * @return array
   */
  function fetch_assoc($res)
  {
    return mysqli_fetch_assoc($res);
  }

  /**
   * @param $res
   *
   * @return array
   */
  function fetch_row($res)
  {
    return mysqli_fetch_row($res);
  }

  /**
   * @param $res
   *
   * @return int
   */
  function num_rows($res)
  {
    return mysqli_num_rows($res);
  }

  /**
   * @param $string
   *
   * @return string
   */
  function escape($string)
  {
    if (!$this->db) {
      $this->connect();
    }
    return mysqli_real_escape_string($this->db,$string);
  }

  /**
   * @param $string
   *
   * @return string
   */
  function real_escape_string($string)
  {
    return $this->escape($string);
  }

  /**
   * @param $string
   *
   * @return string
   */
  function escape_string($string)
  {
    return $this->escape($string);
  }

  /**
   * @return int
   */
  function insert_id()
  {
    return mysqli_insert_id($this->db);
  }

  /**
   * @return int
   */
  function affected_rows()
  {
    return mysqli_affected_rows($this->db);
  }

  /**
   * @param $res
   *
   * @return int
   */
  function num_fields($res)
  {
    return mysqli_num_fields($res);
  }

  /**
   * @return bool
   */
  function close()
  {
    return mysqli_close($this->db);
  }

  /**
   * @param $res
   * @param $row
   *
   * @return bool
   */
  function data_seek($res, $row)
  {
    return mysqli_data_seek($res, $row);
  }

  /**
   * @return int
   */
  function errno()
  {
    return mysqli_errno($this->db);
  }

  /**
   * @return string
   */
  function error()
  {
    return mysqli_error($this->db);
  }

  /**
   * @param $res
   *
   * @return bool
   */
  function free_result($res) {
    return mysqli_free_result($res);
  }

}