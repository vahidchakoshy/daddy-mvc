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
		$autoload_functions = array('Router', 'Template', 'Autoload');
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
		$action_class = $this->Router->action.'Action';
		$action_function = $this->Router->action;
		if(file_exists('application/'.APPLICATION .'/modules/'.$this->Router->module.'/actions/'.$this->Router->action.'Action.php'))
		{
			require 'application/'.APPLICATION .'/modules/'.$this->Router->module.'/actions/'.$this->Router->action.'Action.php';
			$action = new $action_class();
			call_user_func_array(array(&$action, $action_function), $this->Router->params);
		}else{
			echo 'we dont have this action: <b>'.$this->Router->action. '</b> of module: <b>'.$this->Router->module .' </b>' ;
			die();
		}
	}
	
	function dispatch()
	{
		$this->Template->display();
	}
	
}