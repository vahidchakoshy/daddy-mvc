<?php
class Form_validation
{
	var $fields = array();
	
	function set_rule($field, $type)
	{
		$this->fields[$field] = $type; 
	}
	
	function validate()
	{
		foreach ($this->fields as $field => $type)
		{
			$function = 'val_'.$type;
			if( ! $this->$function($field))
			{
				return FALSE;
			}
		}
		return TRUE;
	}
	
	function val_require($field)
	{
		if( ! Request::get('post', $field))
		{
			return FALSE;
		}
		
		return TRUE;
	}
	
}