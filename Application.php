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
		require 'Router.php';
		$this->Router = new Router();
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
		
	}
	
}