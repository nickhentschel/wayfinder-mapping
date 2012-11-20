<?php

class Map extends CI_Controller {	

	function index() {
		$data = array(
			'title' => 'map selected'
		);
		$this->load->model('Map_model');
		$this->template->load('default', 'map', $data);
	}

	function display($id = null) {
		$data = array(
			'title' => 'Upload a map',
		);
		$this->load->model('Map_model');

		if(!is_null($id)) {					
			$data['image'] = $this->Map_model->get_image($id);
		} else {
			$data['error'] = "Please select a map";
		}
		$this->template->load('default', 'map', $data);
	}
}