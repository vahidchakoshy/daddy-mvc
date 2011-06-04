<?php
class BaseActions
{
	var $parameters = array();
	
	var $app;
	
	function __construct()
	{
		$this->app = APPLICATION::getInsetance();
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
		$app = $this->app;
		extract($this->parameters);
		ob_start();
		require 'application/'.APPLICATION.'/modules/'.$app->Router->module.'/views/'.$app->Router->action.'.php';
		
		$this->app->Template->setVar('content', ob_get_contents());
		@ob_end_clean();
	}
}