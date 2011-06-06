<?php
class Autoload
{
	function __construct()
	{
		foreach (Config::get('autoload', 'helpers') as $helper)
		{
			if(file_exists('system/helpers/'.$helper.'.php'))
			{
				require 'system/helpers/'.$helper.'.php';
			}elseif(file_exists('application/'.APPLICATION.'/helpers/'.$helper.'.php'))
			{
				require 'application/'.APPLICATION.'/helpers/'.$helper.'.php';
			}
		}
	}
}