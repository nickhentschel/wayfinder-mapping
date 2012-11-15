<?php

class UploadMap extends CI_Controller {

	function index() {
		$data = array(
			'title' => 'Upload a map'
		);

		$this->load->model('Map_model');
		$data['message'] = 'Select Image to Upload';

		if($this->input->post('upload')) {
			$success = $this->Map_model->do_upload($this->input->post('description'));
			if($success) {
				$data['message'] = 'Successful Upload!';
			} else {
				$data['message'] = 'Upload error. Please try again.';
			}
		}		

		$this->template->load('default', 'uploadmap', $data);

	}

}