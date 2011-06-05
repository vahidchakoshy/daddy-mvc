<?php
class NewsModel extends BaseModel
{
	function get_news()
	{
		$query = $this->get('news');
		return $query;
	}
}