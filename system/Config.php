<?php
class Config
{
	public static $configs;
	
	public static function init()
	{
		self::$configs = new stdClass();
		$config_files = array('db' => 'database');
		foreach ($config_files as $var=>$file)
		{
			require 'application/'.APPLICATION.'/config/'.$file.'.php' ;
			foreach ($$var as $key=>$value)
			{
				self::setConfig($var, $key, $value);
			}
		}
	}
	
	public static function setConfig($class, $var_name, $value)
	{
		self::$configs->$class->$var_name = $value;
	}
	
	public static function get($class, $key = FALSE)
	{
		if($key != FALSE)
		{
			return self::$configs->$class->$key;
		}else{
			return self::$configs->$class;
		}
	}
}