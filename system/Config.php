<?php
class Config
{
	public static $configs;
	
	public static function init()
	{
		self::$configs = new stdClass();
		$config_files = array('db' => 'database',
							  'router' => 'router',
							  'autoload' => 'autoload');
		foreach ($config_files as $var=>$file)
		{
			require 'application/'.APPLICATION.'/config/'.$file.'.php' ;
			foreach ($$var as $key=>$value)
			{
				self::setConfig($var, $key, $value);
			}
		}
		
		/*
		 * Special thanks to Codeigniter framework
		 * @author vahid chakoshy
		 */
		if ( self::get('config', 'base_url') == '')
		{
			if (isset($_SERVER['HTTP_HOST']))
			{
				$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
				$base_url .= '://'. $_SERVER['HTTP_HOST'];
				$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			}
			else
			{
				$base_url = 'http://localhost/';
			}
			self::setConfig('config', 'base_url', $base_url);
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
			if(isset(self::$configs->$class->$key))
			{
				return self::$configs->$class->$key;
			}else{
				return FALSE;
			}
		}else{
			if(isset(self::$configs->$class))
			{
				return self::$configs->$class;
			}else{
				return FALSE;
			}
		}
	}
}