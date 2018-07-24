<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Inventory_adjustment extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('inventory_adjustment_model','inventory_adjustment');
        $this->load->model('item_model','item');
        $this->load->model('stock_model','stock');
        $this->isLoggedIn();   
    }
    
    public function index()
    {
    	$item = $this->item->get_data();
        $this->global['pageTitle'] = 'TIP : Master inventory_adjustment';
        $data['dataItem'] = $item;
        $this->loadViews("inventory/inventory_adjustment", $this->global, $data, NULL , NULL);
    }
    
 	
	public function ajax_list()
	{
		$list = $this->inventory_adjustment->get_datatables();
		

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $inventory_adjustment) {
			$no++;
			$row = array();
			$row[] = $inventory_adjustment->nama_item;
			$row[] = $inventory_adjustment->comment;
			$row[] = $inventory_adjustment->qty;

			//add html for action
			$row[] = '
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_inventory_adjustment('."'".$inventory_adjustment->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->inventory_adjustment->count_all(),
						"recordsFiltered" => $this->inventory_adjustment->count_filtered(),
						"data" => $data
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->inventory_adjustment->get_by_id($id);
		
		$data->updated_at = ($data->updated_at == date("Y-m-d H:i:s")) ? '' : $data->updated_at; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'item_id' => $this->input->post('item_id'),
				'comment' => $this->input->post('comment'),
				'qty' => $this->input->post('qty'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
			);
		// $insert = $this->inventory_adjustment->save($data);

		if($this->inventory_adjustment->save($data)){
			$this->ajax_update($this->input->post('item_id'), $this->input->post('qty'), 'minus');
		}
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update($id,$out,$type)
	{
		// check data stock
		$dataStock = $this->stock->get_by_item_id($id);
		$stockInt = (int)$dataStock->qty;
		if($type == 'minus'){
			$totalPotongStock = $stockInt - $out;
		}else{
			$totalPotongStock = $stockInt + $out;
		}
		$data = array(
				'qty' => $totalPotongStock,
				'updated_at' => date("Y-m-d H:i:s"),
			);
		$this->stock->update(array('item_id' => $id), $data);
	}


	public function ajax_delete($id)
	{	
		// check qty data yang ingin di hapus, lalu tambahkan kembali ke stock
		$dataIa = $this->inventory_adjustment->get_by_id($id);
		$qtyInt = (int)$dataIa->qty;
		$itemIdInt = (int)$dataIa->item_id;
		$this->inventory_adjustment->delete_by_id($id);
		$this->ajax_update($itemIdInt, $qtyInt, 'plus');
		echo json_encode(array("status" => TRUE));
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

		if($this->input->post('comment') == '')
		{
			$data['inputerror'][] = 'comment';
			$data['error_string'][] = 'comment is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('qty') == '')
		{
			$data['inputerror'][] = 'qty';
			$data['error_string'][] = 'qty required';
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