<?php
class Category extends CI_Controller {
	/**
	 * загальний список категорій
	 */
	public function index() {
		$data['title'] = 'Category List';
		$data['list'] = $this->category_model->category_list();
		$this->load->view('templates/header');
		$this->load->view('lists/categoryList', $data);
		$this->load->view('templates/footer');
	}

	/**
	 * модалка для додавання нової категорії
	 */
	public function addModal() {
		$this->load->view('templates/modalCategory');
	}

	/**
	 * збереження категорії
	 */
	public function saveCategory() {
		$requestData = $this->input->post();
		if (empty($requestData['category'])) {
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
		$insertData ["category"] = $requestData['category'];
		$id = $this->category_model->setNewCategory($insertData);
		$data['list'] = $this->category_model->getCategoryByID($id);
		$result = array();
		$result["status"] = true;
		$result["html"] = $this->load->view('lists/oneCategory', $data, true);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($result))
			->_display();
		exit;
	}


}
