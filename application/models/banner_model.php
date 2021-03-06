<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model
{

    var $table = 'tbl_banner';
    var $column_order = array('name', 'type',null); //set column field database for datatable orderable
    var $column_search = array('name', 'type'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('bannerId' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function _get_datatables_query()
    {
        
        $this->db->from('tbl_banner');

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
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

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
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
        $this->db->where('bannerId',$id);
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
        $this->db->where('bannerId', $id);
        $this->db->delete($this->table);
    }

    public function get_data(){
        $this->db->select('id,nama');
        $this->db->from('tbl_users');
        $query = $this->db->get();
        return $query->result();
    }



    public function main_banner(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','mainbanner');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();   
    }





     public function main_barcode(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','barcode');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();   
    }


     public function main_promo(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','promoaplikasi');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();   
    }


    public function main_partner(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','partners');
        $query = $this->db->get();
        return $query->result();   
    }
    public function main_logo(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','logo');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result(); }
    public function main_dealpopular(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','dealpopular');
        $query = $this->db->get();
        return $query->result(); }
    public function main_playstore(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','playstore');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result(); }



     public function main_steporder(){
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('type','steporder');
          $this->db->limit(1);
        $query = $this->db->get();
        return $query->result(); }
}
  