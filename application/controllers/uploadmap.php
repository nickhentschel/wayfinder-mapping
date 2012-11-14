<?php

class UploadMap extends CI_Controller {

	function index() {
		$data = array(
			'title' => 'Upload a map'
		);

		$this->load->model('Uploadmap_model');

		if($this->input->post('upload')) {
			$success = $this->Uploadmap_model->do_upload();
			if($success) {
				$data['successmessage'] = 'Successful Upload!';
			} else {
				$data['error'] = 'Upload error. Please try again.';
			}
		}

		$this->template->load('default', 'uploadmap', $data);

	}

}