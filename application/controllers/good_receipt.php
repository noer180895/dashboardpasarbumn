<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Good_receipt extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('good_receipt_model','good_receipt');
        $this->load->model('item_model','item');
        $this->load->model('stock_model','stock');
        $this->load->model('po_model','po');
        $this->isLoggedIn();   
    }
    
    public function index()
    {
    	$po = $this->po->get_data();
        $this->global['pageTitle'] = 'TIP : Good Receipt';
        $data['dataPo'] = $po;
        $this->loadViews("inventory/good_receipt", $this->global, $data, NULL , NULL);
    }
    
 	
	public function ajax_list()
	{
		$list = $this->good_receipt->get_datatables();
		

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $good_receipt) {
			$no++;
			$row = array();
			$row[] = $good_receipt->no_po;
			$row[] = $good_receipt->no_gr == '0' ? '-' : $good_receipt->no_gr;
			$row[] = $good_receipt->good_details;
			$row[] = $good_receipt->qty;
			$row[] = $good_receipt->qty_delivery;

			//add html for action

			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_gr('."'".$good_receipt->id."'".')"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_good_receipt('."'".$good_receipt->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->good_receipt->count_all(),
						"recordsFiltered" => $this->good_receipt->count_filtered(),
						"data" => $data
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->good_receipt->get_by_id($id);
		
		$data->updated_at = ($data->updated_at == date("Y-m-d H:i:s")) ? '' : $data->updated_at; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{

		$this->_validate();
		$data = array(
				'no_po' => $this->input->post('no_po'),
				'no_gr' => $this->input->post('no_gr'),
				'good_details' => $this->input->post('good_details'),
				'qty' => (int)$this->input->post('qty'),
				'qty_delivery' => (int)$this->input->post('qty_delivery'),
				'comment' => $this->input->post('comment'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			);


		if($this->good_receipt->save($data)){
			$this->ajax_update($this->input->post('item_id'), (int)$this->input->post('qty_delivery'), 'plus');

			// update status related ke po
			$intqty = (int)$this->input->post('qty');
			$intqty_deliv = (int)$this->input->post('qty_delivery'); 
			$items = $this->po->get_detail_items($this->input->post('no_po'));
			$intItems = (int)$items->item_id;
			$countQtyStock = $this->good_receipt->get_count_qty_stock($this->input->post('no_po'));
			$intQtyDelive = (int) $countQtyStock->qty_delivery;
			if($intQtyDelive > 0){
				if($intQtyDelive == $intqty){
					$this->po->update_status(array('no_po' => $this->input->post('no_po')),array('status'=>1));
				}else{
					$this->po->update_status(array('no_po' => $this->input->post('no_po')),array('status'=>3));
				}
			}
			

		}
		echo json_encode(array("status" => TRUE));


	}

	public function ajax_update($id,$out,$type)
	{
		// check data stock
		$dataStock = $this->stock->get_by_item_id($id);
		$stockInt = (int)$dataStock->qty;

		$totalPotongStock = 0;
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

	


	public function get_po_detail($nopo)
	{
		$po_detail = $this->good_receipt->get_po_detail($nopo);
		//output to json format
		echo json_encode($po_detail);
	}


	public function ajax_delete($id)
	{
		// check qty data yang ingin di hapus, lalu tambahkan kembali ke stock
		$data = $this->good_receipt->get_by_id($id);
		$qtyInt = (int)$data->qty_delivery;
		$items = $this->po->get_detail_items($data->no_po);
		$itemIdInt = (int)$items->item_id;
		$this->good_receipt->delete_by_id($id);
		$this->ajax_update($itemIdInt, $qtyInt, 'plus');


		// update status related ke po
		$intqty = (int)$data->qty;
		$countQtyStock = $this->good_receipt->get_count_qty_stock($this->input->post('no_po'));
		$intQtyDelive = (int) $countQtyStock->qty_delivery;
		if($intQtyDelive > 0){
			$this->po->update_status(array('no_po' => $this->input->post('no_po')),array('status'=>3));
		}else{
			$this->po->update_status(array('no_po' => $this->input->post('no_po')),array('status'=>4));
		}
		


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