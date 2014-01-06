<?php

class Item_model extends CI_Model
{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get($id)
    {
        $item = $this->db->where('id', $id)
                        ->get('gallery_items');

        if($item->num_rows() > 0)
        {
            $item = $item->result_array();
            return $item[0];
        } else {
            return false;
        }
    }
    public function get_by_category($cat_id)
    {
    	$items = $this->db->select('gallery_items.id, gallery_items.name, gallery_items.description, gallery_items.price, gallery_items.is_sold, gallery_items.resource_url')
    					->from('gallery_items')
    					->join('categories_has_gallery_items', 'categories_has_gallery_items.gallery_items_id = gallery_items.id')
    					->where('categories_has_gallery_items.categories_id', $cat_id)
    					->get();       
		if($items->num_rows() > 0)
		{
			return $items->result_array();
		} else {
			return false;
		}
    }

    public function add($data, $cat_id)
    {
    	$this->db->insert('gallery_items', $data);
    	$item = array(
    		'categories_id' => $cat_id,
    		'gallery_items_id' => $this->db->insert_id()
    		);
    	$this->db->insert('categories_has_gallery_items', $item);
    }
}