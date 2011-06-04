<?php
class Template
{
	var $vars = array();
	
	var $theme = 'main';
	
	function __construct()
	{
		//echo 'template loaded';
	}
	
	function setVar($key, $value)
	{
		$this->vars[$key] = $value;
	}
	
	function display()
	{
		extract($this->vars);
		require 'static/themes/'.$this->theme.'/index.php';
	}
	
}