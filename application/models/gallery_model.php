<?php

class Gallery_model extends CI_Model
{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


	/* ----------------------------------------------------------------
	*	Method - get()
	*  ----------------------------------------------------------------
	*	Takes one arguments.
	*/
	public function get($id)
	{
		$q = $this->db
					->where('id', $id)
					->limit(1)
					->get('galleries');
		if($q->num_rows() > 0)
		{
			$q = $q->result_array();
			return $q[0];
		} else {
			return false;
		}
	}

	public function get_with_userid($userid)
	{
		$galleries = $this->db->select('galleries.id, galleries.name, galleries.description, galleries.is_active')
								->from('galleries')
								->join('galleries_has_users', 'galleries_has_users.galleries_id = galleries.id')
								->where('galleries_has_users.users_id', $userid)
								->get();

		if($galleries->num_rows() > 0)
		{
			return $galleries->result_array();
		} else {
			return false;
		}
	}

	public function get_oldest()
	{
		$gallery_id = $this->db->select_min('id')
							->get('galleries');
		$gallery_id = $gallery_id->result_array();
		$gallery = $this->db->where('id', $gallery_id['0']['id'])
							->limit(1)
							->get('galleries');

		if($gallery->num_rows() > 0)
		{
			$gallery = $gallery->result_array();
			return $gallery[0];
		} else {
			return false;
		}
	}

	public function add($gallery)
	{
		$this->db->insert('galleries', $gallery);

		$gallery_id = $this->db->insert_id();
		$inserted_gallery = $this->get($gallery_id);

		if($inserted_gallery)
		{
			$data = array(
				'users_id' => $_SESSION['user_id'],
				'galleries_id' => $gallery_id
				);
			$this->db->insert('galleries_has_users', $data);
			return $inserted_gallery;
		} else {
			return false;
		}

	}

	public function update($gallery)
	{
		$this->db->where('id', $gallery['id'])
				->update('galleries', $gallery);
	}

	public function toggle_active($id)
	{
		$gallery =$this->db->where('id',$id)
						->get('galleries');

		if($gallery->num_rows() > 0)
		{
			$gallery = $gallery->result_array();
			$gallery = $gallery[0];

			if($gallery['is_active'] == 0)
			{	
				$gallery['is_active'] = 1;
			} else {
				$gallery['is_active'] = 0;
			}

			$this->db->where('id', $gallery['id'])
					->update('galleries', $gallery);
		} else {
			return false;
		}
	}

}