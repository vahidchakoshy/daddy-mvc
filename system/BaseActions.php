<?php
class BaseActions
{
	var $parameters = array();
	
	function __construct()
	{
		
	}
	
	function __set($key, $value)
	{
		$this->parameters[$key] = $value;
	}
	
	function __get($key)
	{
		return $this->parameters[$key];
	}
	
	function __destruct()
	{
		$app = Application::getInsetance();
		extract($this->parameters);
		require 'application/'.APPLICATION.'/modules/'.$app->Router->module.'/views/'.$app->Router->action.'.php';
		
		
	}
}