<?php

class Gallery_model extends CI_Model
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
		$this->db->insert('gallery', $item);
	}

	/* ----------------------------------------------------------------
	*	Method - get_all()
	*  ----------------------------------------------------------------
	*	Takes no arguments.
	*/
	public function get_all()
	{
		$q = $this->db->get('gallery');

		return $q->result_array();
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
					->get('gallery');

		$q = $q->result_array();

		return $q[0];
	}

	/* ----------------------------------------------------------------
	*	Method - update()
	*  ----------------------------------------------------------------
	*	Takes one arguments.
	*/
	public function update($item)
	{
		$this->db
			->where('id', $item['id'])
			->update('gallery', $item);
	}

}