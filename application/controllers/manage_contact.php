<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_contact extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_model','contact');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');
        
    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage contact';
        $this->loadViews("manage_contact/index", $this->global, NULL , NULL);
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
            $row[] = $contact->name;
            $row[] = $contact->show == 1 ? "Show" : "Hide";
            $row[] = $contact->createdAt;
            $row[] = $contact->updatedAt;



            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_contact/addcontact/'."".$contact->contactId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_contact/delete/'."".$contact->contactId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
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
    public function addcontact($contactId = null){
        $contactIdInt = (int) $contactId;
        $this->global['pageTitle'] = 'Manage Add contact';
        if($contactId != null){
            $data['contact'] = $this->contact->get_by_id($contactIdInt);
            $data['url_image'] = base_url(). 'assets/uploads/contact/'. $data['contact']->image;
        }else{
            $data['contact'] = null;
        }


        $data['show'] = array(1=>"Show",0=>"Hidden");

        $this->global['pageTitle'] = 'Manage Add contact';
        

        $this->loadViews("manage_contact/addcontact", $this->global , $data, NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'position' => $this->input->post('position'),
                'show' => $this->input->post('show'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );


        //file upload code 
        //set file upload settings 
        $config['upload_path']          = APPPATH. '../assets/uploads/contact/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if(!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error);
                var_dump($error);
            }else{
                $upload_data = $this->upload->data();
 
                //get the uploaded file name
                $data['image'] = $upload_data['file_name'];
 
                if($this->input->post('contactId') != NULL){ // FOR UPDATE
                    if($this->contact->update(array('contactId' => $this->input->post('contactId')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data contact');
                        redirect('manage_contact/');
                    }
                }else{
                    if($this->contact->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add contact');
                        redirect('manage_contact/');
                    }
                }
            }

        }else{
            if($this->input->post('contactId') != NULL){ // FOR UPDATE
                if($this->contact->update(array('contactId' => $this->input->post('contactId')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data contact');
                    redirect('manage_contact/');
                }
            }else{
                if($this->contact->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add contact');
                    redirect('manage_contact/');
                }
            } 
        }
        
    }



    // delete
    public function delete($contactId)
    {
        $this->contact->delete_by_id($contactId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_contact/');
    }


}

?>