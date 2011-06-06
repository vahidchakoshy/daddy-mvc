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
		if(file_exists('application/'.APPLICATION.'/modules/'.$app->Router->module.'/views/'.$app->Router->action.'.php'))
		{
			require 'application/'.APPLICATION.'/modules/'.$app->Router->module.'/views/'.$app->Router->action.'.php';
		}else{
			echo 'we dont have view file for this action';
		}
			
		$this->app->Template->setVar('content', ob_get_contents());
		@ob_end_clean();

	}
}