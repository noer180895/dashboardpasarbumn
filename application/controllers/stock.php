<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Stock extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('stock_model','stock');
        $this->isLoggedIn();   
    }
    
    public function index()
    {
        $this->global['pageTitle'] = 'TIP : Master stock';
        $this->loadViews("stock/stock", $this->global, NULL , NULL);
    }
    
 	
	public function ajax_list()
	{
		$list = $this->stock->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $stock) {
			$no++;
			$row = array();
			$row[] = $stock->nama_item;
			$row[] = $stock->jenis_item;
			$row[] = $stock->qty;
			$row[] = $stock->warehouse;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->stock->count_all(),
						"recordsFiltered" => $this->stock->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}



	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('item_id') == '')
		{
			$data['inputerror'][] = 'item_id';
			$data['error_string'][] = 'Item id is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('qty') == '')
		{
			$data['inputerror'][] = 'qty';
			$data['error_string'][] = 'qty is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('warehouse_id') == '')
		{
			$data['inputerror'][] = 'warehouse_id';
			$data['error_string'][] = 'warehouse_id required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'TIP : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>