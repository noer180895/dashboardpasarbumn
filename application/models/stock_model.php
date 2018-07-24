<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model {

	var $table = 'tbl_stock';
	var $column_order = array('nama_item','jenis_item','warehouse','qty','created_at',null); //set column field database for datatable orderable
	var $column_search = array('item.nama','item.jenis_item','warehouse.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		// $this->load->database();
	}

	private function _get_datatables_query()
	{	
		$this->db->select('item.nama as nama_item, item.jenis_item as jenis_item, tbl_stock.qty, warehouse.nama as warehouse');
		$this->db->from('tbl_stock');
		$this->db->join('tbl_item item', 'tbl_stock.item_id=item.id', 'left');
	    $this->db->join('tbl_warehouse warehouse', 'tbl_stock.warehouse_id=warehouse.id', 'left');
	    $this->db->order_by('tbl_stock.id', 'desc');

		$i = 0;
	
		foreach ($this->column_search as $stock) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					// $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($stock, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($stock, $_POST['search']['value']);
				}

				// if(count($this->column_search) - 1 == $i) //last loop
					// $this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		// if(isset($_POST['order'])) // here order processing
		// {
		// 	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		// } 
		// else if(isset($this->order))
		// {
		// 	$order = $this->order;
		// 	$this->db->order_by(key($order), $order[key($order)]);
		// }
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_by_item_id($id){
		$this->db->select('qty');
		$this->db->from($this->table);
		$this->db->where('item_id',$id);
		$query = $this->db->get();

		return $query->row();	
	}

	

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}
