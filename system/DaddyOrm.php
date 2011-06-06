<?php
/*
 * Tiny ORM designed for this framework
 * @author vahid chakoshy
 */
class DaddyOrm
{
	var $conn;
	var $hostname;
	var $username;
	var $password;
	var $database;
	var $char_set;
	
	var $conditions = array();
	
	function __construct()
	{
		if( ! isset($this->conn))
		{
			foreach (Config::get('db') as $key=>$val)
			{
				$this->$key = $val;
			}
			
			$this->_connect();
		}
	}
	
	/*
	 * Connect to Database
	 */
	function _connect()
	{
		if($conn = @mysql_connect($this->hostname, $this->username, $this->password))
		{
			$this->conn = $conn;
			mysql_select_db($this->database);
			$this->_setUnicode();
		}else{
			echo 'cant access to database with this configuration';
		}
	}
	
	function _setUnicode()
	{
		mysql_query("SET NAMES `".$this->char_set."`");
	}
	
	function get($table)
	{
		$sql = "SELECT * FROM `$table`  ";
		$sql .= $this->_get_conditions();
		
		//echo $sql;
		return $this->_query($sql);
	}
	
	function get_row($table)
	{
		$sql = "SELECT * FROM `$table`  ";
		$sql .= $this->_get_conditions();
		
		//echo $sql;
		$result = $this->_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row;
	}
	
	function _get_conditions()
	{
		if($count = count($this->conditions))
		{
			$re = ' WHERE ';
			for($i=0; $i<$count; $i++)
			{
				$re .= $this->conditions[$i];
			}
			return $re;
		}
		
		return '';
	}
	
	function where($field, $value)
	{
		if(is_string($value))
		{
			$this->conditions[] = "`$field` = '$value'";
		}else{
			$this->conditions[] = "`$field` = $value";
		}
	}
	
	function _query($sql)
	{
		$query = mysql_query($sql);
		return $query;
	}
}