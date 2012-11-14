<?php

class Main extends CI_Controller {

	function index() {
		$data = array(
			'title' => 'Welcome to the Jungle'
		);
		$this->template->load('default', 'splash', $data);
	}

}