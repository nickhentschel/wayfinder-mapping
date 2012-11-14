<?php 

class Uploadmap_model extends CI_Model {
	
	private $uploadmap_path;

	function __construct() {
		parent::__construct();
		$this->uploadmap_path = realpath(APPPATH . "../assets/uploads");
	}	

	function do_upload() {

		$config = array(
			'allowed_types' => 'jpg|jpeg|png|gif',
			'upload_path' => $this->uploadmap_path
		);

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()) {
			// something went wrong, errors occurred
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			return true;
		}
	}
}