<?php
class Application
{
	public static $instance;
	
	var $name = 'vahid';
	
	function __construct()
	{
		self::$instance = $this;
	}
	
	function init()
	{
		$autoload_functions = array('Router', 'Template');
		foreach ($autoload_functions as $class)
		{
			require $class.'.php';
			$this->$class = new $class();
		}
	}
	
	public static function getInsetance()
	{
		if(isset(self::$instance))
		{
			return self::$instance;
		}
	}
	
	function start()
	{
		require 'application/'.APPLICATION .'/modules/'.$this->Router->module.'/actions/'.$this->Router->action.'Action.php';
		$action = new indexAction();
		$action->index();
	}
	
	function dispatch()
	{
		$this->Template->display();
	}
	
}