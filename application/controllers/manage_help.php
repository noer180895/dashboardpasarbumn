<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_help extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('help_model','help');
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


         $role = $this->session->userdata ( 'role' );
        $isall = $this->session->userdata ( 'isall' );
          $isread = $this->session->userdata ( 'isread' );
                $iscreate = $this->session->userdata ( 'iscreate' );
        $isedit = $this->session->userdata ( 'isedit' );
        $isdelete = $this->session->userdata ( 'isdelete' );


        foreach ($list as $help) {
            $no++;
            $row = array();
            $row[] = $help->question;
            $row[] = $help->answer;
            $row[] = $help->createdAt;
            $row[] = $help->updatedAt;



            //add html for action

             if($role == 'Admin' || $role == 'admin' || $isall == "1"){ 
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_help/addhelp/'."".$help->idHelp."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_help/delete/'."".$help->idHelp."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
              }else if($isedit == "1" && $isdelete == "0"){
                 $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_help/addhelp/'."".$help->idHelp."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            }else if($isedit == "1" && $isdelete == "1"){
                 $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_help/addhelp/'."".$help->idHelp."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_help/delete/'."".$help->idHelp."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            }else if($isedit == "0" && $isdelete == "1"){
                 $row[] = '
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_help/delete/'."".$help->idHelp."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }

        
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
    public function addhelp($idHelp = null){
        $idHelpInt = (int) $idHelp;
        $this->global['pageTitle'] = 'Manage Add help';
        if($idHelp != null){
            $data['help'] = $this->help->get_by_id($idHelpInt);
           // $data['url_image'] = base_url(). 'assets/uploads/help/'. $data['help']->image;
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
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
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
 
                if($this->input->post('idHelp') != NULL){ // FOR UPDATE
                    if($this->help->update(array('idHelp' => $this->input->post('idHelp')), $data)){
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
            if($this->input->post('idHelp') != NULL){ // FOR UPDATE
                if($this->help->update(array('idHelp' => $this->input->post('idHelp')), $data)){
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
    public function delete($idHelp)
    {
        $this->help->delete_by_id($idHelp);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_help/');
    }


}

?>