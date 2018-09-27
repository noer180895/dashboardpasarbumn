<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_footer extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('footer_model','footer');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');
        
    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage footer';
        $this->loadViews("manage_footer/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->footer->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();
        $role = $this->session->userdata ( 'role' );
        $isall = $this->session->userdata ( 'isall' );
          $isread = $this->session->userdata ( 'isread' );
                $iscreate = $this->session->userdata ( 'iscreate' );
        $isedit = $this->session->userdata ( 'isedit' );
        $isdelete = $this->session->userdata ( 'isdelete' );

        foreach ($list as $footer) {
            $no++;
            $row = array();
            $row[] = $footer->name;
            $row[] = $footer->type;
            $row[] = $footer->createdAt;
            $row[] = $footer->updatedAt;



            //add html for action
            if($role == 'Admin' || $role == 'admin' || $isall == "1"){ 
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_footer/addfooter/'."".$footer->footerId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_footer/delete/'."".$footer->footerId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
             }else if($isedit == "1" && $isdelete == "0"){
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_footer/addfooter/'."".$footer->footerId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
             }else if($isedit == "1" && $isdelete == "1"){
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_footer/addfooter/'."".$footer->footerId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_footer/delete/'."".$footer->footerId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
               }else if($isedit == "0" && $isdelete == "1"){

                $row[] = '
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_footer/delete/'."".$footer->footerId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->footer->count_all(),
                        "recordsFiltered" => $this->footer->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add footer
    public function addfooter($footerId = null){
        $footerIdInt = (int) $footerId;
        $this->global['pageTitle'] = 'Manage Add footer';
        if($footerId != null){
            $data['footer'] = $this->footer->get_by_id($footerIdInt);
            $data['url_image'] = base_url(). 'assets/uploads/footer/'. $data['footer']->image;
        }else{
            $data['footer'] = null;
        }


        $data['type'] = array("mainfooter"=>"Main footer","gambarbarcode"=>"Gambar Barcode");

        $this->global['pageTitle'] = 'Manage Add footer';
        

        $this->loadViews("manage_footer/addfooter", $this->global , $data, NULL);
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
        $config['upload_path']          = APPPATH. '../assets/uploads/footer/';
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
 
                if($this->input->post('footerId') != NULL){ // FOR UPDATE
                    if($this->footer->update(array('footerId' => $this->input->post('footerId')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data footer');
                        redirect('manage_footer/');
                    }
                }else{
                    if($this->footer->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add footer');
                        redirect('manage_footer/');
                    }
                }
            }

        }else{
            if($this->input->post('footerId') != NULL){ // FOR UPDATE
                if($this->footer->update(array('footerId' => $this->input->post('footerId')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data footer');
                    redirect('manage_footer/');
                }
            }else{
                if($this->footer->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add footer');
                    redirect('manage_footer/');
                }
            } 
        }
        
    }



    // delete
    public function delete($footerId)
    {
        $this->footer->delete_by_id($footerId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_footer/');
    }


}

?>