<?php
class FilterShoppingModel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * повертає унікальні записи з таблиці (для категорій та стусів)
	 * @param $type
	 * @return mixed
	 */
	function fetch_filter_type($type){
		$this->db->distinct();
		$this->db->select($type);
		$query = $this->db->get("shopping");
		return $query->result_array();
	}

	/**
	 * повертає відфільтровані за статусом та категорією записи
	 * @param $data
	 * @return mixed
	 */
	public function getData($data) {
		$this->db->select('*');
		$this->db->from('shopping');

		if (isset($data['category'])){
			$this->db->where_in ('category', $data['category']);
		}
		if (isset($data['status'])){
			$this->db->where_in ('status', $data['status']);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
}
