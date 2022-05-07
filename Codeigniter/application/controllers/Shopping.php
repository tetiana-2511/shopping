<?php
class Shopping extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('shopping_model');
		$this->load->model('filterShoppingModel');
	}

	/**
	 * загальний список покупок
	 */
	public function index() {
		$data['title'] = 'Shopping List';
		$data['list'] = $this->shopping_model->getShoppingList();
		$data["category"] = $this->category_model->category_list();
		$data["status"] = $this->filterShoppingModel->fetch_filter_type("status");
		foreach ($data['list'] as $key => $item){
			$catId = $item["category"];
			$data['list'][$key]["category_name"] = $data["category"][$catId]["category"];
		}
		$this->load->view('templates/header');
		$this->load->view('lists/shoppingList', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * модалка для додавання нового елемента в списку покупок
	 */
	public function addModal() {
		$data['list'] = $this->category_model->category_list();
		$this->load->view('templates/modalAdd', $data);
	}

	/**
	 * збереження нового елемента зі списку покупок
	 */
	public function saveItem() {
		$requestData = $this->input->post();
		if (empty($requestData['item_name']) || empty($requestData['category']) || empty($requestData['status'])) {
			debug("data from request is not correct", $requestData);
			$this->output
				->set_status_header(400)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode(array(
					'status' => false,
					'error' => "data was not correct"
				)))
				->_display();
			exit;
		}
		$insertData ["item_name"] = $requestData['item_name'];
		$insertData ["category"] = $requestData['category'];
		$insertData ["status"] = $requestData['status'];
		$id = $this->shopping_model->setShoppingItem($insertData);
		$data['list'] = $this->shopping_model->getItemByID($id);
		$data["category"] = $this->category_model->category_list();
		foreach ($data['list'] as $key => $item){
			$catId = $item["category"];
			$data['list'][$key]["category_name"] = $data["category"][$catId]["category"];
		}
		$result = array();
		$result["status"] = true;
		$result["html"] = $this->load->view('lists/oneShopping', $data, true);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($result))
			->_display();
		exit;
	}


	/**
	 * збереження редагованого елемента зі списку покупок
	 */
	public function saveEditItem(){
		$requestData = $this->input->post();
		if (empty($requestData['id']) || empty($requestData['item_name']) || empty($requestData['category']) || empty($requestData['status'])) {
			debug("data from request is not correct", $requestData);
			$this->output
				->set_status_header(400)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode(array(
					'status' => false,
					'error' => "data was not correct"
				)))
				->_display();
			exit;
		}
		$res = $this->shopping_model->updateShoppingItem($requestData);
		if ($res == true){
			$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode(array(
					'status' => true
				)))
				->_display();
			exit;
		} else{
			$this->output
				->set_status_header(400)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode(array(
					'status' => false,
					'error' => "data was not correct"
				)))
				->_display();
			exit;
		}
	}

	/**
	 * видалення елемента списку покупок
	 */
	public function delItem(){
		$requestData = $this->input->post();
		if (empty($requestData['id'])) {
			debug("data from request is not correct", $requestData);
			$this->output
				->set_status_header(400)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode(array(
					'status' => false,
					'error' => "data was not correct"
				)))
				->_display();
			exit;
		}
		$this->shopping_model->delShoppingItem($requestData["id"]);
	}


}
