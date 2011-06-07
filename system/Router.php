<?php
class Router
{
	var $action;
	var $module;
	var $params = array();

	function __construct()
	{
		$this->init();
	}

	function init()
	{
		$this->module = Config::get('router', 'default_module');
		$this->action = Config::get('router', 'default_action');
		
		if(isset($_SERVER['PATH_INFO']))
		{
			$uri = $_SERVER['PATH_INFO'];
			$uri_array = explode('/', $uri);
			array_shift($uri_array);

			$this->module = $uri_array[0];
			
			if(isset($uri_array[1]))
			{
				$this->action = $uri_array[1];
			}

			$this->params = array_slice($uri_array, 2);
		}

	}
}