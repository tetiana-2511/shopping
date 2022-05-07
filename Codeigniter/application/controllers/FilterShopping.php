<?php
class FilterShopping extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('filterShoppingModel');
	}

	/**
	 * фільтрація списку по статусах та категоріях
	 */
	function filter(){
		$requestData = $this->input->post();
		if (empty($requestData['category']) && empty($requestData['status'])) {
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
		$data["list"] = $this->filterShoppingModel->getData($requestData);
		$data["category"] = $this->category_model->category_list();
		foreach ($data['list'] as $key => $item){
			$catId = $item["category"];
			$data['list'][$key]["category_name"] = $data["category"][$catId]["category"];
		}
		$this->load->view('lists/oneShopping', $data);
	}
}
