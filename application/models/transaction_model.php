<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CI_Model
{

    var $table = 'tbl_transaction';
    var $column_order = array('name',null); //set column field database for datatable orderable
    var $column_search = array('name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('transactionId' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function _get_datatables_query()
    {
        
        $this->db->select('product.name as name, trans.no_order as no_order, trans.checkin as checkin, trans.checkout as checkout, trans.status, trans.createdAt, trans.updatedAt, trans.transactionId');
        $this->db->from('tbl_transaction trans');
        $this->db->join('tbl_product product', 'trans.id_product=product.productId', 'left');
        $this->db->group_by('trans.transactionId');

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
        $this->db->where('transactionId',$id);
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
        $this->db->where('transactionId', $id);
        $this->db->delete($this->table);
    }

    public function get_data(){
        $this->db->select('id,nama');
        $this->db->from('tbl_users');
        $query = $this->db->get();
        return $query->result();
    }


     public function main_hotel(){
        $this->db->select('*');
        $this->db->from('tbl_transaction');
        $this->db->where('type','hotel');
        $query = $this->db->get();
        return $query->result(); 
    }


    public function hotel_detail($id){
        $this->db->select('*');
        $this->db->from('tbl_transaction');
        $this->db->where('transactionId',$id);
        $query = $this->db->get();
        return $query->result(); 
    }


    public function transaction_list($userId){
        $this->db->select('product.name as name, trans.no_order as no_order, trans.checkin as checkin, trans.checkout as checkout');
        $this->db->from('tbl_transaction trans');
        $this->db->join('tbl_product product', 'trans.id_product=product.productId', 'left');
        $this->db->group_by('trans.transactionId');
        $this->db->where('id_user',$userId);
        $this->db->where('status','pending');
        $this->db->order_by('transactionId', 'desc');
        $query = $this->db->get();
        return $query->result(); 
    }


     public function transaction_list_all($userId){
        $this->db->select('product.name as name, trans.no_order as no_order, trans.checkin as checkin, trans.checkout as checkout');
        $this->db->from('tbl_transaction trans');
        $this->db->join('tbl_product product', 'trans.id_product=product.productId', 'left');
        $this->db->group_by('trans.transactionId');
        $this->db->where('id_user',$userId);
        $query = $this->db->get();
        return $query->result(); 
    }




    public function transaction_list_success($userId){
          $this->db->select('product.name as name, trans.no_order as no_order, trans.checkin as checkin, trans.checkout as checkout');
        $this->db->from('tbl_transaction trans');
        $this->db->join('tbl_product product', 'trans.id_product=product.productId', 'left');
        $this->db->group_by('trans.transactionId');
        $this->db->where('status','success');
         $this->db->where('id_user',$userId);
        $query = $this->db->get();
        return $query->result(); 
    }


    public function transaction_detail($no_order){
        $this->db->select('product.name as name, trans.no_order as no_order, trans.checkin as checkin, trans.checkout as checkout, trans.contact_name, trans.status, product.image0, payment.name as payment');
        $this->db->from('tbl_transaction trans');
        $this->db->join('tbl_product product', 'trans.id_product=product.productId', 'left');
         $this->db->join('tbl_paymentgateway payment', 'trans.id_payment=payment.idPayment', 'left');
        $this->db->group_by('trans.transactionId');
        $this->db->where('no_order',$no_order);
        $query = $this->db->get();
        return $query->result(); 
    }


   
}

  