<?php
class viewAction extends BaseActions
{
	function view($news_id)
	{
		$news_model = new NewsModel();
		$news_model->where('id', (int) $news_id);
		$this->news = $news_model->get_row('news');
	}
}