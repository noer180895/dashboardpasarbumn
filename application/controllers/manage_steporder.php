<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_steporder extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('steporder_model','steporder');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage steporder';
        $this->loadViews("manage_steporder/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->steporder->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


           $role = $this->session->userdata ( 'role' );
        $isall = $this->session->userdata ( 'isall' );
          $isread = $this->session->userdata ( 'isread' );
                $iscreate = $this->session->userdata ( 'iscreate' );
        $isedit = $this->session->userdata ( 'isedit' );
        $isdelete = $this->session->userdata ( 'isdelete' );


        foreach ($list as $steporder) {
            $no++;
            $row = array();
            $row[] = $steporder->name;
            $row[] = $steporder->type;
            $row[] = $steporder->createdAt;
            $row[] = $steporder->updatedAt;



            //add html for action
            if($role == 'Admin' || $role == 'admin' || $isall == "1"){ 
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_steporder/addsteporder/'."".$steporder->id."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_steporder/delete/'."".$steporder->id."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }else if($isedit == "1" && $isdelete == "0"){
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_steporder/addsteporder/'."".$steporder->id."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            }else if($isedit == "1" && $isdelete == "1"){
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_steporder/addsteporder/'."".$steporder->id."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_steporder/delete/'."".$steporder->id."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
             }else if($isedit == "0" && $isdelete == "1"){
                  $row[] = '
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_promo/delete/'."".$promo->idPromo."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->steporder->count_all(),
                        "recordsFiltered" => $this->steporder->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add steporder
    public function addsteporder($id = null){
        $idInt = (int) $id;
        $this->global['pageTitle'] = 'Manage Add steporder';
        if($id != null){
            $data['steporder'] = $this->steporder->get_by_id($idInt);
            $data['url_image'] = base_url(). 'assets/uploads/steporder/'. $data['steporder']->image;
        }else{
            $data['steporder'] = null;
        }


        $data['type'] = array("hotel"=>"Hotel","train"=>"Train", "flight" => "Flight", "retail" => "Retail"); 

        $this->global['pageTitle'] = 'Manage Add Steporder';
            

        $this->loadViews("manage_steporder/addsteporder", $this->global , $data, NULL);
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
        $config['upload_path']          = APPPATH. '../assets/uploads/steporder/';
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
 
                if($this->input->post('id') != NULL){ // FOR UPDATE

                    if($this->steporder->update(array('id' => $this->input->post('id')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data steporder');
                        redirect('manage_steporder/');
                    }
                }else{

                    if($this->steporder->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add steporder');
                        redirect('manage_steporder/');
                    }
                }
            }

        }else{
            if($this->input->post('id') != NULL){ // FOR UPDATE
                if($this->steporder->update(array('id' => $this->input->post('id')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data steporder');
                    redirect('manage_steporder/');
                }
            }else{
                if($this->steporder->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add steporder');
                    redirect('manage_steporder/');
                }
            } 
        }
        
    }



    // delete
    public function delete($id)
    {
        $this->steporder->delete_by_id($id);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_steporder/');
    }


}

?>