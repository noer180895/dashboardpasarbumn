<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_career extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('career_model','career');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage career';
        $this->loadViews("manage_career/index", $this->global, NULL , NULL);
    }

    public function ajax_list()
    {
        $list = $this->career->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();




           $role = $this->session->userdata ( 'role' );
        $isall = $this->session->userdata ( 'isall' );
          $isread = $this->session->userdata ( 'isread' );
                $iscreate = $this->session->userdata ( 'iscreate' );
        $isedit = $this->session->userdata ( 'isedit' );
        $isdelete = $this->session->userdata ( 'isdelete' );

        foreach ($list as $career) {
            $no++;
            $row = array();
            $row[] = $career->position;
            $row[] = $career->spesification;
            $row[] = $career->createdAt;
            $row[] = $career->updatedAt;



            //add html for action
            if($role == 'Admin' || $role == 'admin' || $isall == "1"){ 
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_career/addcareer/'."".$career->idCareer."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_career/delete/'."".$career->idCareer."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }else if($isedit == "1" && $isdelete == "0"){
                  $row[] = '
                 <a class="btn btn-sm btn-primary" href="'.$base_url.'manage_career/addcareer/'."".$career->idCareer."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
             }else if($isedit == "1" && $isdelete == "1"){
                  $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_career/addcareer/'."".$career->idCareer."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_career/delete/'."".$career->idCareer."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
               }else if($isedit == "0" && $isdelete == "1"){
                 $row[] = '
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_career/delete/'."".$career->idCareer."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->career->count_all(),
                        "recordsFiltered" => $this->career->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add career
    public function addcareer($idCareer = null){
        $idCareerInt = (int) $idCareer;
        $this->global['pageTitle'] = 'Manage Add career';
        if($idCareer != null){
            $data['career'] = $this->career->get_by_id($idCareerInt);
           // $data['url_image'] = base_url(). 'assets/uploads/career/'. $data['career']->image;
        }else{
            $data['career'] = null;
        }


        $data['type'] = array("maincareer"=>"Main career","gambarbarcode"=>"Gambar Barcode", "promoaplikasi" => "Promo Aplikasi",  "partners" => "Partners", "logo" => "logo", "dealpopular" => "Dealpopular", "playstore" => "playstore"); 

        $this->global['pageTitle'] = 'Manage Add career';
            

        $this->loadViews("manage_career/addcareer", $this->global , $data, NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'position' => $this->input->post('position'),
                'spesification' => $this->input->post('spesification'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );


        //file upload code 
        //set file upload settings 
        $config['upload_path']          = APPPATH. '../assets/uploads/career/';
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
 
                if($this->input->post('idCareer') != NULL){ // FOR UPDATE
                    if($this->career->update(array('idCareer' => $this->input->post('idCareer')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data career');
                        redirect('manage_career/');
                    }
                }else{
                    if($this->career->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add career');
                        redirect('manage_career/');
                    }
                }
            }

        }else{
            if($this->input->post('idCareer') != NULL){ // FOR UPDATE
                if($this->career->update(array('idCareer' => $this->input->post('idCareer')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data career');
                    redirect('manage_career/');
                }
            }else{
                if($this->career->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add career');
                    redirect('manage_career/');
                }
            } 
        }
        
    }



    // delete
    public function delete($idCareer)
    {
        $this->career->delete_by_id($idCareer);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_career/');
    }


}

?>