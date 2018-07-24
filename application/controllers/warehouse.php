<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Warehouse extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('warehouse_model','warehouse');
        $this->isLoggedIn();   
    }
    
    public function index()
    {
        $this->global['pageTitle'] = 'TIP : Master Warehouse';
        $this->loadViews("inventory/warehouse", $this->global, NULL , NULL);
    }
    
 	
	public function ajax_list()
	{
		$list = $this->warehouse->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $warehouse) {
			$no++;
			$row = array();
			$row[] = $warehouse->nama;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_warehouse('."'".$warehouse->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_warehouse('."'".$warehouse->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->warehouse->count_all(),
						"recordsFiltered" => $this->warehouse->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->warehouse->get_by_id($id);
		$data->updated_at = ($data->updated_at == date("Y-m-d H:i:s")) ? '' : $data->updated_at; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'nama' => $this->input->post('nama'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
			);
		$insert = $this->warehouse->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'nama' => $this->input->post('nama'),
				'updated_at' => date("Y-m-d H:i:s"),
			);
		$this->warehouse->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->warehouse->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'nama is required';
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