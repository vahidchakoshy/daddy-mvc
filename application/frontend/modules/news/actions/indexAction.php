<?php
class indexAction extends BaseActions
{
	function index()
	{
		$this->name = 'vahid';
		$news_model = new NewsModel();
		$this->news = $news_model->get_news();
	}
}