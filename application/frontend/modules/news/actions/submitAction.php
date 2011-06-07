<?php
class submitAction extends BaseActions
{
	function submit()
	{
		$form = new Form_validation();
		$form->set_rule('title', 'require');
		if($form->validate())
		{
			$this->insert();
		}
	}
	
	function insert()
	{
		$data['title'] = Request::get('post', 'title');
		$data['text']  = Request::get('post', 'text');
		$news = new NewsModel();
		$news->insert('news', $data);
		redirect(base_url('index.php/news'));
	}
}