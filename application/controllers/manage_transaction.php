<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_transaction extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaction_model','transaction');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage transaction';
        $this->loadViews("manage_transaction/index", $this->global, NULL , NULL);
    }

    public function ajax_list()
    {
        $list = $this->transaction->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


        foreach ($list as $transaction) {
            $no++;
            $row = array();
            $row[] = $transaction->name;
            $row[] = $transaction->no_order;
            $row[] = $transaction->checkin;
            $row[] = $transaction->checkout;
             $row[] = '<b>' . $transaction->status . '</b>';
            $row[] = $transaction->createdAt;
            $row[] = $transaction->updatedAt;


            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="" title="update">Update</a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->transaction->count_all(),
                        "recordsFiltered" => $this->transaction->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add transaction
    public function addtransaction($idtransaction = null){
        $idtransactionInt = (int) $idtransaction;
        $this->global['pageTitle'] = 'Manage Add transaction';
        if($idtransaction != null){
            $data['transaction'] = $this->transaction->get_by_id($idtransactionInt);
           // $data['url_image'] = base_url(). 'assets/uploads/transaction/'. $data['transaction']->image;
        }else{
            $data['transaction'] = null;
        }


        $data['type'] = array("maintransaction"=>"Main transaction","gambarbarcode"=>"Gambar Barcode", "transactionaplikasi" => "transaction Aplikasi",  "partners" => "Partners", "logo" => "logo", "dealpopular" => "Dealpopular", "playstore" => "playstore"); 

        $this->global['pageTitle'] = 'Manage Add transaction';
            

        $this->loadViews("manage_transaction/addtransaction", $this->global , $data, NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'kode_transaction' => $this->input->post('kode_transaction'),
                'start_transaction' => date("Y-m-d H:i:s"),
                'end_transaction' => date("Y-m-d H:i:s"),
                'potongan_transaction' => $this->input->post('potongan_transaction'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );


        //file upload code 
        //set file upload settings 
        $config['upload_path']          = APPPATH. '../assets/uploads/transaction/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error);
            }else{
                $upload_data = $this->upload->data();
 
                //get the uploaded file name
                $data['image'] = $upload_data['file_name'];
 
                if($this->input->post('idtransaction') != NULL){ // FOR UPDATE
                    if($this->transaction->update(array('idtransaction' => $this->input->post('idtransaction')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data transaction');
                        redirect('manage_transaction/');
                    }
                }else{
                    if($this->transaction->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add transaction');
                        redirect('manage_transaction/');
                    }
                }
            }

        }else{
            if($this->input->post('idtransaction') != NULL){ // FOR UPDATE
                if($this->transaction->update(array('idtransaction' => $this->input->post('idtransaction')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data transaction');
                    redirect('manage_transaction/');
                }
            }else{
                if($this->transaction->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add transaction');
                    redirect('manage_transaction/');
                }
            } 
        }
        
    }



    // delete
    public function delete($idtransaction)
    {
        $this->transaction->delete_by_id($idtransaction);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_transaction/');
    }


}

?>