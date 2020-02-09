<?php
namespace App\ParseIt;

use App\ParseIt\drivers\Database;

class DB extends Database
{
  private $_fetch;

  /**
   *
   *Shorthand function for single value or 1 row query
   *
   * @param string $query SQL query
   *
   * @param array  $callback
   *
   * @return mixed false on query fail, assoc array in case of multiple columns or single value for 1 column
   */

  function sql2val($query, $callback = array())
  {
    $res = $this->sql($query);
    if ($res) {
      if ($this->num_rows($res) > 1) {
        trigger_error("Query \"$query\" supposed to return only 1 row, " . $this->num_rows($res) . " returned");
      }
      $row = $this->fetch_assoc($res);
      if (is_array($row)) {
        if (count($row) > 1) {
          if (count($callback) > 0) {
            foreach ($callback as $k => $v) {
              $row[$k] = call_user_func(array($this, $v), $row[$k], $k, $row);
            }
          }
          return $row;
        } else {
          return array_pop($row);
        }
      }
    }
    return false;
  }

  /**
   *perform query and return assoc array of values
   *
   * @param string $query SQL query
   * @param array  $callback Assoc array with callback functions
   *
   * @return mixed false on query fail or assoc array of query results
   */
  function sql2array($query, $callback = array())
  {
    $out = array();
    $res = $this->sql($query);
    if ($res) {
      while ($row = $this->fetch_assoc($res)) {
        if (count($callback) > 0) {
          foreach ($callback as $k => $v) {
            $row[$k] = call_user_func(array($this, $v), $row[$k], $k, $row);
          }
        }
        $out[] = $row;
      }
      return $out;
    } else {
      return false;
    }
  }

  /**
   *creates or updates row
   *key - assoc array with key and it's value.
   *3 options:
   * key is empty or 0 ex array('id'=>''). Will try to create new row. $this->insert_id() will give you row id. Please note you may got in trouble in case key is not numeric auto_increment
   * key is not existent value. Will try to create new row with known id
   * key - existent value. Will try to update table.
   *values - assoc array key=>value
   *table
   *returns sql query resource on success or fail
   *use $this->affeced_rows() or $this->insert_id() if needed
   */
  function save_val($key, $values, $table)
  {
    if (!is_array($key) || !is_array($values)) {
      //params must be arrays
      trigger_error("Wrong parameters in save_val arrays expected, strings given");
      return false;
    }
    $id = @array_pop(@array_keys($key));
    if (!$id) {
      trigger_error("Wrong key array in save_val");
      return false;
    }
    if ($key[$id] != "" && $key[$id] != 0) {
      //check if row with id exists
      if ($this->sql2val("SELECT $table.$id from `$table` where $table.$id='" . $key[$id] . "'") == $key[$id]) {
        //exists, update
        $action = "update";
      } else {
        //not exists INSERT
        $action = "insert_exists";
      }
    } else {
      $action = "insert_create";
    }
    if ($action == "update") {
      //updating existent row
      $sql = "UPDATE `$table` SET ";
      foreach ($values as $k => $v) {
        $v = $this->escape($v);
        $sql .= "$table.$k = '" . $v . "',";
      }
      $sql = trim($sql, ",") . " WHERE $table.$id='" . $key[$id] . "'";
      return $this->sql($sql);
    } elseif ($action == "insert_exists") {
      //inserting into table, key value is known
      $sql = "INSERT INTO `$table` ($id,";
      foreach ($values as $k => $v) {
        $sql .= "$k,";
      }
      $sql = trim($sql, ",") . ") VALUES ('" . $key[$id] . "',";
      foreach ($values as $v) {
        $v = $this->escape($v);
        $sql .= "'" . $v . "',";
      }
      $sql = trim($sql, ",") . ")";
      return $this->sql($sql);
    } else {
      //inserting into table, creating new key first
      //will fail in case key not autoincremented integer
      $sql = "INSERT INTO `$table` ($id,";
      foreach ($values as $k => $v) {
        $sql .= "$k,";
      }
      $sql = trim($sql, ",") . ") VALUES (null,";
      foreach ($values as $v) {
        $v = $this->escape($v);
        $sql .= "'" . $v . "',";
      }
      $sql = trim($sql, ",") . ")";
      return $this->sql($sql);
    }
  }

  /**
   *shorthand to performing query and fetching results.
   *Use with caution, no nested loops allowed
   *
   * @param string $query SQL query
   *
   * @return mixed assoc array of current row or false on resourse end
   *Example:
   *while ($row = $db->fetch("SELECT id,value from `tablename`")) {
   *echo "ID: ".$row['id']." VALUE: ".$row['value']."\n";
   *}
   */
  function fetch($query)
  {
    if (!$this->_fetch) {
      $this->_fetch = $this->sql($query);
    }
    $res = $this->fetch_assoc($this->_fetch);
    if (!$res) {
      unset($this->_fetch);
      return false;
    } else {
      return $res;
    }
  }

  /**
   *Function adds column to the table
   *
   * @param string $tbl Table name to add column to
   * @param string $field Column name
   * @param string $type Optional type VARCHAR(500) by default
   * @return bool
   */

  function add_column($tbl, $field, $type = 'VARCHAR(500)')
  {
    $sql = "ALTER TABLE `$tbl`  ADD COLUMN `$field` $type CHARSET " . $this->encoding . ";";
    $res = $this->sql($sql);
    if (!$res) {
      return false;
    }
    return true;
  }

  /**
   *Function returns array of all children
   *Presumed $tbl table structure:
   *-----------
   *|id|parent|
   *
   * @param string $tbl table name
   * @param int    $parent parent id to find leafs of
   * @param string $index Name of id row. Optional. "id" by default
   * @param string $parent_field Name of parent row. Optional. "parent" by default
   *
   * @return array
   */
  function find_leaves($tbl, $parent = 0, $index = "id", $parent_field = "parent")
  {
    $out = array();
    $result = $this->sql("select $index from `$tbl` where $parent_field = " . $parent);
    while ($row = $this->fetch_assoc($result)) {
      $out[] = $row[$index];
      $out = array_merge($out, $this->find_leaves($tbl, $row[$index], $index, $parent_field));
    }
    return array_unique($out);
  }

  /**
   *Basic database backup function
   * @return string current database dump file
   */

  function backup_db()
  {
    $tables = $this->sql2array('SHOW TABLES');
    $return = "";
    foreach ($tables as $table) {
      $table = array_pop($table);
      $result = $this->sql('SELECT * FROM ' . $table);
      $num_fields = $this->num_fields($result);
      $num_rows = $this->num_rows($result);
      $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
      $row2 = $this->fetch_row($this->sql('SHOW CREATE TABLE ' . $table));
      $return .= "\n\n" . $row2[1] . ";\n\n";
      $m = $this->sql('DESCRIBE ' . $table);
      $fields = array();
      while ($mm = $this->fetch_assoc($m)) {
        $fields[] = substr($mm['Type'], 0, strpos($mm['Type'], '('));
      }
      $i = 0;

      while ($row = $this->fetch_row($result)) {

        if ($i % 50 == 0) {
          $return .= 'INSERT INTO ' . $table . ' VALUES';
        }
        $return .= "(";

        for ($j = 0; $j < $num_fields; $j++) {
          if (!isset($row[$j])) {
            $return .= '""';
          } else {
            switch ($fields[$j]) {
              case 'int':
              case 'tinyint':
              case 'smallint':
                $return .= $row[$j];
                break;
              case 'float':
              case 'double':
                $return .= $row[$j];
                break;
              case 'varchar':
              case 'char':
              case 'text':
              case 'enum':
              case 'longtext':
              case 'set':
                $return .= '\'' . addslashes($row[$j]) . '\'';
                break;
              case 'blob':
              case 'varbinary':
                $return .= '0x' . bin2hex($row[$j]);
                break;
              default:
                $return .= '\'' . addslashes($row[$j]) . '\'';
                break;
            }
          }
          if ($j < ($num_fields - 1)) {
            $return .= ',';
          }
        }
        $i++;
        if (($i % 50 == 0 && $i > 0) || $i == ($num_rows)) {
          $return .= ");\n";
        } else {
          $return .= "), ";
        }
      }
      $return .= "\n\n\n";
    }
    return $return;
  }

  /**
   * @param $arr
   *
   * @return bool|string
   */
  function save_arr($arr)
  {
    if (!is_array($arr) || count($arr) == 0) {
      return false;
    }
    $out = 'array(';
    foreach ($arr as $k => $v) {
      if (is_array($v)) {
        $out .= "$k=>" . $this->save_arr($v);
      } else {
        $out .= "$k=>$v, ";
      }
    }
    $out = trim($out, ", ") . ")";
    return $this->escape($out);
  }
}