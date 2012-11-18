<?php 

/**
 * ToDo - add support for thumbnail generation to be used on the select image page
 */

class Map_model extends CI_Model {
	
	private $uploadmap_path;

	function __construct() {
		$this->uploadmap_path = realpath(APPPATH . "../assets/uploads");
	}

	/**
	 * upload image to specified upload path
	 * @param  [string] $description [a description of the image to be uploaded]
	 * @return [boolean]             [returns true or false if successful or unsuccessful]
	 */
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
	 * @param  [array] $image_data   [uploaded image data]
	 * @param  [string] $description [description of image, from post]
	 * @return [type]
	 */
	function update_db($image_data, $description) {
		//var_dump($image_data);
		$this->db->insert('uploadmap',
			array(
				'id' => '',
				'name' => $image_data['file_name'],
				'description' => $description,
				'height' => $image_data['image_height'],
				'width' => $image_data['image_width'],
				'image_path' => $image_data['full_path']
			)
		);
	}

	/**
	 * Get all images from database and return them to the model
	 * @return [array] [an array of images from the uploadmap table]
	 */
	function get_all_images() {
		$query = $this->db->get('uploadmap');
		return($query->result());
	}


	/**
	 * Get a single image from the database based on an image id
	 * @param  [int] $id  [an image id]
	 * @return [array]     [an array of fields from image]
	 */
	function get_image($id) {
		$query = $this->db->query("select * from uploadmap where id = $id");
		return($query->result());
	}
}