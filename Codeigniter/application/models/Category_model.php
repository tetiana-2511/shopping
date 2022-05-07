<?php
class Category_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * повертає масив категорій
	 * @return array
	 */
	public function category_list() {
		$categoriesDb = $this->db->select('*')
				->from('category')
				->order_by('id', 'DESC')
				->get()
				->result_array();
		$categories = array();
		foreach ($categoriesDb as $cat){
			$categories[$cat['id']] = $cat;
		}
		return $categories;
	}

	/**
	 * повертає категорію по id
	 * @param $id
	 * @return mixed
	 */
	function getCategoryByID($id){
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		return $query->result_array();
	}

	/**
	 * додає нову категорію
	 * @param $data
	 * @return mixed
	 */
	function setNewCategory($data){
		$this->db->insert('category',$data);
		$idOfInsertedData = $this->db->insert_id();
		return $idOfInsertedData;
	}
}
