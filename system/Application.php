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
		spl_autoload_register('Application::autoload');
		
		Config::init();
		$autoload_functions = array('Router', 'Template');
		foreach ($autoload_functions as $class)
		{
			require $class.'.php';
			$this->$class = new $class();
		}
		
	}
	
	public static function autoload($class)
	{
		$app = APPLICATION::getInsetance();
		if(file_exists('system/'.$class.'.php'))
		{
			require 'system/'.$class.'.php';
		}elseif(file_exists('application/'.APPLICATION.'/modules/'.$app->Router->module.'/models/'.$class.'.php'))
		{
			require 'application/'.APPLICATION.'/modules/'.$app->Router->module.'/models/'.$class.'.php';
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