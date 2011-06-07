<?php
class Request
{
	static $post = array();
	static $get  = array();
	
	function __construct()
	{
		$this->post_init();
		$this->get_init();
	}
	
	public static function get($type, $key)
	{
		if( ! isset(self::${$type}[$key]))
		{
			return FALSE;
		}
		
		return self::${$type}[$key];
	}
	
	function post_init()
	{
		foreach ($_POST as $key => $value)
		{
			self::$post[$key] = $value;
		}
	}
	
	function get_init()
	{
		foreach ($_GET as $key => $value)
		{
			self::$get[$key] = $value;
		}
	}
	
}