<?php

class Category_model extends CI_Model
{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /* ----------------------------------------------------------------
	*	Method - add()
	*  ----------------------------------------------------------------
	*	Takes one arguments.
	*/
	public function add($item)
	{
		$this->db->insert('categories', $item);
	}

	/* ----------------------------------------------------------------
	*	Method - get_by_gallery()
	*  ----------------------------------------------------------------
	*	Takes one arguments.
	*/
	public function get_by_gallery($gal_id)
	{
		$categories = $this->db->where('galleries_id', $gal_id)
								->get('categories');

		if($categories->num_rows() > 0)
		{
			return $categories->result_array();
		} else {
			return false;
		}
	}

	public function get($id)
	{
		$category = $this->db->where('id', $id)
								->get('categories');

		if($category->num_rows() > 0)
		{
			$category = $category->result_array();
			return $category[0];
		} else {
			return false;
		}
	}

	public function update($data)
	{
		$this->db->where('id', $data['id'])
					->update('categories', $data);
	}

}