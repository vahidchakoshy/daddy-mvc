<?php
class Router
{
	var $action = 'index';
	var $module = 'news';
	var $params = array();
	
	function __construct()
	{
		$this->init();
	}
	
	function init()
	{
		$uri = $_SERVER['PATH_INFO'];
		$uri_array = explode('/', $uri);
		array_shift($uri_array);
		
		$this->module = $uri_array[0];
		$this->action = $uri_array[1];
		
		$this->params = array_slice($uri_array, 2);
		
	}
}