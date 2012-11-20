<?php

class SelectMap extends CI_Controller {
	function index() {
		$this->load->helper('url');
		$data = array(
			'title' => 'Select an existing map'
		);
		$this->load->model('Map_model');
		$data['results'] = $this->Map_model->get_all_images();

		if($this->input->post('submit')) {
			redirect("/map/display/" . $this->input->post('image_id'), 'location');
			//var_dump($this->input->post('image_id'));
		}

		$this->template->load('default', 'selectmap', $data);
	}	
}