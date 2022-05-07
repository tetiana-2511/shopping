<?php
class Shopping_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	/**
	 * повертає список покупок із БД
	 * @param false $slug
	 * @return mixed
	 */
	function getShoppingList($slug = false){
		if ($slug === false){
			$query = $this->db->get('shopping');
			return $query->result_array();
		}
		$query = $this->db->get('shopping', array('slug'=> $slug));
		return $query->row_array();
	}

	/**
	 * повертає елемент списку покупок по id
	 * @param $id
	 * @return mixed
	 */
	function getItemByID($id){
		$this->db->where('id', $id);
		$query = $this->db->get('shopping');
		return $query->result_array();
	}

	/**
	 * додає новий елемент списку покупок до БД
	 * @param $data
	 * @return mixed
	 */
	function setShoppingItem($data){
		$this->db->insert('shopping',$data);
		$idOfInsertedData = $this->db->insert_id();
		return $idOfInsertedData;
	}

	/**
	 * видаляє елемент списку покупок із БД
	 * @param $id
	 */
	function delShoppingItem($id){
		$this->db->where('id', $id);
		$this->db->delete('shopping');
	}

	/**
	 * обновляє елемент списку в БД
	 * @param $data
	 * @return mixed
	 */
	function updateShoppingItem($data){
		$this->db->where('id', $data['id']);
		$query = $this->db->update('shopping', array(
			'item_name' => $data['item_name'],
			'category' => $data['category'],
			'status' => $data['status']
			));
		return $query;
	}
}
