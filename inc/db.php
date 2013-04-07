<?php
include_once '3p/db_result.php';
include_once '3p/db_mysql_result.php';

if (!isset($db)) { trigger_error("\$db not configured, add to config.php"); die(); }
else
{
  $db['connid'] = mysql_connect($db['hostname'], $db['username'], $db['password'], TRUE);
  @mysql_select_db($db['database'], $db['connid']);
}

function db_is_write_type($sql)
{
  if ( ! preg_match('/^\s*"?(SET|INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|TRUNCATE|LOAD DATA|COPY|ALTER|GRANT|REVOKE|LOCK|UNLOCK)\s+/i', $sql))
    return FALSE;
  return TRUE;
}

function db_select($sql, $ret = 'result')
{
  global $db;
  $resid = mysql_query($sql, $db['connid']);
  
  if (db_is_write_type($sql)) return;
  
  $res = new CI_DB_mysql_result();
  
  $res->result_id = $resid;
  $res->conn_id = $db['connid'];

  $res->num_rows = $res->num_rows();
  $res->result_object = $res->result_object();
  $res->result_array = $res->result_array();
  
  if ($ret == 'array') return $res->result_array;
  if ($ret == 'arraysingle') return $res->result_array[0];
  if ($ret == 'object') return $res->result_object;
  
  return $res;
}
?>
