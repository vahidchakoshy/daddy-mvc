<?php
if( ! function_exists('base_url'))
{
	function base_url($suffix = '')
	{
		$base_url = Config::get('config', 'base_url');
		if($suffix != '')
		{
			$base_url .= $suffix;
		}
		
		return $base_url;
	}
}

if( ! function_exists('redirect'))
{
	function redirect($url)
	{
		header('Location: ' . $url);
	}
}