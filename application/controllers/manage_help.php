<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_help extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner_model','help');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage help';
        $this->loadViews("manage_help/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->help->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


        foreach ($list as $help) {
            $no++;
            $row = array();
            $row[] = $help->name;
            $row[] = $help->type;
            $row[] = $help->createdAt;
            $row[] = $help->updatedAt;



            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_help/addhelp/'."".$help->helpId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_help/delete/'."".$help->helpId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->help->count_all(),
                        "recordsFiltered" => $this->help->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add help
    public function addhelp($helpId = null){
        $helpIdInt = (int) $helpId;
        $this->global['pageTitle'] = 'Manage Add help';
        if($helpId != null){
            $data['help'] = $this->help->get_by_id($helpIdInt);
            $data['url_image'] = base_url(). 'assets/uploads/help/'. $data['help']->image;
        }else{
            $data['help'] = null;
        }


        $data['type'] = array("mainhelp"=>"Main help","gambarbarcode"=>"Gambar Barcode", "promoaplikasi" => "Promo Aplikasi",  "partners" => "Partners", "logo" => "logo", "dealpopular" => "Dealpopular", "playstore" => "playstore"); 

        $this->global['pageTitle'] = 'Manage Add help';
            

        $this->loadViews("manage_help/addhelp", $this->global , $data, NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'url' => $this->input->post('url'),
                'type' => $this->input->post('type'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );


        //file upload code 
        //set file upload settings 
        $config['upload_path']          = APPPATH. '../assets/uploads/help/';
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
 
                if($this->input->post('helpId') != NULL){ // FOR UPDATE
                    if($this->help->update(array('helpId' => $this->input->post('helpId')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data help');
                        redirect('manage_help/');
                    }
                }else{
                    if($this->help->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add help');
                        redirect('manage_help/');
                    }
                }
            }

        }else{
            if($this->input->post('helpId') != NULL){ // FOR UPDATE
                if($this->help->update(array('helpId' => $this->input->post('helpId')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data help');
                    redirect('manage_help/');
                }
            }else{
                if($this->help->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add help');
                    redirect('manage_help/');
                }
            } 
        }
        
    }



    // delete
    public function delete($helpId)
    {
        $this->help->delete_by_id($helpId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_help/');
    }


}

?>