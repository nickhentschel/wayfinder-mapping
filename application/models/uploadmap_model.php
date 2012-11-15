<?php 

class Uploadmap_model extends CI_Model {
	
	private $uploadmap_path;

	function __construct() {
		$this->uploadmap_path = realpath(APPPATH . "../assets/uploads");
	}	

	function do_upload($description) {

		$config = array(
			'allowed_types' => 'jpg|jpeg|png|gif',
			'upload_path' => $this->uploadmap_path
		);

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()) {
			// something went wrong, errors occurred
			return false;
		} else {
			$this->update_db($this->upload->data(), $description);
			//var_dump($image_data);
			return true;
		}
	}

	/**
	 * Upload image data to database after uploading image to server  
	 * @param  [array] $image_data  [uploaded image data]
	 * @param  [string] $description [description of image, from post]
	 * @return [type]
	 */
	function update_db($image_data, $description) {
		$this->db->insert('uploadmap',
			array(
				'id' => '',
				'name' => $image_data['raw_name'],
				'description' => $description,
				'height' => $image_data['image_height'],
				'width' => $image_data['image_width'],
				'image_path' => $image_data['full_path']
			)
		);
	}
}