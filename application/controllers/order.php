<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Order extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('header_order_model','order');
        $this->load->model('detail_order_model','order_delivery');
        $this->isLoggedIn();   
    }
    
    public function index()
    {
        $this->global['pageTitle'] = 'TIP : Master order';
        $this->loadViews("order/order", $this->global, NULL , NULL);
    }
    

    public function delivery_order()
    {
        $this->global['pageTitle'] = 'TIP : Master order delivery';
        $this->loadViews("order/order_delivery", $this->global, NULL , NULL);
    }

    public function ajax_list_delivery_order()
	{
		$list = $this->order_delivery->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $order) {
			$no++;
			$row = array();
			$row[] = $order->no_order;
			$row[] = $order->product;
			$row[] = $order->qty;
			$row[] = $order->total;

			//add html for action
			// $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_order('."'".$order->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			// 	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_order('."'".$order->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}



		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->order_delivery->count_all(),
						"recordsFiltered" => $this->order_delivery->count_filtered(),
						"data" => $data,
				);

		//output to json format
		echo json_encode($output);
	}

 	
	public function ajax_list()
	{
		$list = $this->order->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $order) {
			$no++;
			$row = array();
			$row[] = $order->no_order;
			$row[] = $order->customer_name;
			$row[] = $order->order_date;
			$row[] = $order->due_date_delivery;
			$row[] = $order->amount;
			$row[] = $order->method_payment;

			// kondition status
			if($order->status == 4){
				$row[] = 'pending';
			}else if($order->status == 1){
				$row[] = 'done'; 	
			}else if($order->status == 2){
				$row[] = 'partial delivery';
			}else if($order->status == 3){
				$row[] = 'canceled';
			}

			$row[] = $order->comments;

			//add html for action
			// $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_order('."'".$order->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			// 	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_order('."'".$order->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}



		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->order->count_all(),
						"recordsFiltered" => $this->order->count_filtered(),
						"data" => $data,
				);

		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->order->get_by_id($id);
		$data->updated_at = ($data->updated_at == date("Y-m-d H:i:s")) ? '' : $data->updated_at; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'no_order' => $this->input->post('kode_order'),
				'customer_id' => $this->input->post('nama'),
				'order_date' => $this->input->post('harga'),
				'due_date_delivery' => $this->input->post('jenis_order'),
				'amount' => $this->input->post('jenis_order'),
				'method_payment' => $this->input->post('jenis_order'),
				'status' => $this->input->post('status'),
				'comments' => $this->input->post('comments'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
			);
		$insert = $this->order->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'kode_order' => $this->input->post('kode_order'),
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'jenis_order' => $this->input->post('jenis_order'),
				'updated_at' => date("Y-m-d H:i:s"),
			);
		$this->order->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->order->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kode_order') == '')
		{
			$data['inputerror'][] = 'kode_order';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'nama is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('harga') == '')
		{
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'harga required';
			$data['status'] = FALSE;
		}

		if($this->input->post('jenis_order') == '')
		{
			$data['inputerror'][] = 'jenis_order';
			$data['error_string'][] = 'Please select jenis order';
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