<?php
if( ! function_exists('base_irl'))
{
	function base_url()
	{
		return Config::get('config', 'base_url');
	}
}