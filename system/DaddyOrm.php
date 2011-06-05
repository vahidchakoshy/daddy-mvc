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
		$sql = "SELECT * FROM `$table`;";
		return $this->_query($sql);
		
	}
	function _query($sql)
	{
		$query = mysql_query($sql);
		return $query;
	}
}