<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_contact_user extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_user_model','contact');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');
        
    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage contact user';
        $this->loadViews("manage_contact_user/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->contact->get_datatables();



        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


        foreach ($list as $contact) {
            $no++;
            $row = array();
            $row[] = $contact->bookingId;
            $row[] = $contact->product;
            $row[] = $contact->name;
            $row[] = $contact->email;
            $row[] = $contact->createdAt;
            $row[] = $contact->updatedAt;



        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->contact->count_all(),
                        "recordsFiltered" => $this->contact->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add contact
    // public function addcontact($contactId = null){
    //     $contactIdInt = (int) $contactId;
    //     $this->global['pageTitle'] = 'Manage Add contact';
    //     if($contactId != null){
    //         $data['contact'] = $this->contact->get_by_id($contactIdInt);
    //         $data['url_image'] = base_url(). 'assets/uploads/contact/'. $data['contact']->image;
    //     }else{
    //         $data['contact'] = null;
    //     }


    //     $data['show'] = array(1=>"Show",0=>"Hidden");

    //     $this->global['pageTitle'] = 'Manage Add contact';
        

    //     $this->loadViews("manage_contact_user/addcontact", $this->global , $data, NULL);
    // }



    //save data
    // public function save()
    // {
    //     $data = array(
    //             'bookingId' => $this->input->post('bookingId'),
    //             'product' => $this->input->post('product'),
    //             'name' => $this->input->post('name'),
    //             'email' => $this->input->post('email'),
    //             'tell_concern' => $this->input->post('tell_concern'),
    //             'createdAt' => date("Y-m-d H:i:s"),
    //             'updatedAt' => date("Y-m-d H:i:s"),
    //         );


  
    //     if($this->contact->save($data)){ //   FOR POST
    //         $this->session->set_flashdata('success', 'Success Add contact');
    //         redirect('manage_contact_user/');
    //     }
        
        
        
    // }



    // delete
    public function delete($contactId)
    {
        $this->contact->delete_by_id($contactId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_contact_user/');
    }


}

?>