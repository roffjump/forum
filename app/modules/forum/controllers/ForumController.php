<?php

class ForumController extends BaseController {

	protected $layout = 'dashboard::layout.master';

	public function index(){
		$this->layout->content = View::make('forum::topics');
	}

	public function topics(){
		sd( Input::all() );
	}
}
