<?php

class DashboardController extends BaseController {

	protected $layout = 'dashboard::layout.master';

	public function index(){
		$this->layout->content = View::make('dashboard::forum');
	}

	public function show(){
		sd( Input::all() );
	}
}
