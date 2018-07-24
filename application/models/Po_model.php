<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po_model extends CI_Model {

	var $table = 'trx_po';
	var $column_order = array('no_po','created_at',null); //set column field database for datatable orderable
	var $column_search = array('no_po'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		// $this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from('trx_po');

		$i = 0;
	
		foreach ($this->column_search as $po) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					// $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($po, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($po, $_POST['search']['value']);
				}

				// if(count($this->column_search) - 1 == $i) //last loop
					// $this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
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

	public function get_data(){
		$this->db->select('trx_po.no_po, trx_po.qty as qty_delivery');
		$this->db->from('trx_po');
		$this->db->join('tbl_item item', 'trx_po.item_id=item.id', 'left');
		$this->db->where_in('trx_po.status', array(3,4)); // filter status where po status open and partial delivery
	    $this->db->order_by('trx_po.id', 'desc');
	    $query = $this->db->get();
		return $query->result();
	}



	public function get_detail_items($nopo){
		$this->db->select('item_id');
		$this->db->from('trx_po');
		$this->db->where_in('no_po', $nopo); 
	    $query = $this->db->get();
		$idItem = $query->row();

		return $idItem;


	}


	public function update_status($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

}
