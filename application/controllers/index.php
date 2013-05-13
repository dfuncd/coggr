<?php

class indexController extends Controller {

	public function index() {
		Template::set('test', array('test' => 'teasdfasdf'));
		return Template::fetch('index');
	}

	public function about() {
		echo 'hi';
	}


}