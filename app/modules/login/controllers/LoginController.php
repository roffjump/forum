<?php

class LoginController extends BaseController {

	protected $layout = 'login::layout.master';

	public function index(){
		$this->layout->content = View::make('login::form');
	}

	public function show(){
		sd( Input::all() );
	}
}
