<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_logo extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('logo_model','logo');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage logo';
        $this->loadViews("manage_logo/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->logo->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


        $role = $this->session->userdata ( 'role' );
        $isall = $this->session->userdata ( 'isall' );
        $isread = $this->session->userdata ( 'isread' );
        $iscreate = $this->session->userdata ( 'iscreate' );
        $isedit = $this->session->userdata ( 'isedit' );
        $isdelete = $this->session->userdata ( 'isdelete' );


        foreach ($list as $logo) {
            $no++;
            $row = array();
            $row[] = $logo->name;
            $row[] = $logo->type;
            $row[] = $logo->createdAt;
            $row[] = $logo->updatedAt;



            //add html for action

            if($role == 'Admin' || $role == 'admin' || $isall == "1"){ 
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_logo/addlogo/'."".$logo->logoId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_logo/delete/'."".$logo->logoId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }else if($isedit == "1" && $isdelete == "0"){
                 $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_logo/addlogo/'."".$logo->logoId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
              }else if($isedit == "1" && $isdelete == "1"){
                 $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_logo/addlogo/'."".$logo->logoId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_logo/delete/'."".$logo->logoId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
             }else if($isedit == "0" && $isdelete == "1"){
                 $row[] = '<a class="btn btn-sm btn-danger" href="'.$base_url.'manage_logo/delete/'."".$logo->logoId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->logo->count_all(),
                        "recordsFiltered" => $this->logo->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add logo
    public function addlogo($logoId = null){
        $logoIdInt = (int) $logoId;
        $this->global['pageTitle'] = 'Manage Add logo';
        if($logoId != null){
            $data['logo'] = $this->logo->get_by_id($logoIdInt);
            $data['url_image'] = base_url(). 'assets/uploads/logo/'. $data['logo']->image;
        }else{
            $data['logo'] = null;
        }


        $data['type'] = array("mainlogo"=>"Main logo","gambarbarcode"=>"Gambar Barcode");

        $this->global['pageTitle'] = 'Manage Add logo';
        

        $this->loadViews("manage_logo/addlogo", $this->global , $data, NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );


        //file upload code 
        //set file upload settings 
        $config['upload_path']          = APPPATH. '../assets/uploads/logo/';
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
 
                if($this->input->post('logoId') != NULL){ // FOR UPDATE
                    if($this->logo->update(array('logoId' => $this->input->post('logoId')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data logo');
                        redirect('manage_logo/');
                    }
                }else{
                    if($this->logo->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add logo');
                        redirect('manage_logo/');
                    }
                }
            }

        }else{
            if($this->input->post('logoId') != NULL){ // FOR UPDATE
                if($this->logo->update(array('logoId' => $this->input->post('logoId')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data logo');
                    redirect('manage_logo/');
                }
            }else{
                if($this->logo->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add logo');
                    redirect('manage_logo/');
                }
            } 
        }
        
    }



    // delete
    public function delete($logoId)
    {
        $this->logo->delete_by_id($logoId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_logo/');
    }


}

?>