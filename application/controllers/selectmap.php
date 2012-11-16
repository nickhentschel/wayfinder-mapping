<?php

class SelectMap extends CI_Controller {
	function index() {
		$data = array(
			'title' => 'Select an existing map'
		);
		$this->load->model('Map_model');
		$data['results'] = $this->Map_model->get_all_images();

		if($this->input->post('submit')) {
			var_dump($this->input->post('image_id'));
		}

		$this->template->load('default', 'selectmap', $data);
	}	
}