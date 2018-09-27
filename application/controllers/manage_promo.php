<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_promo extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('promo_model','promo');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage promo';
        $this->loadViews("manage_promo/index", $this->global, NULL , NULL);
    }

    public function ajax_list()
    {
        $list = $this->promo->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();



          $role = $this->session->userdata ( 'role' );
        $isall = $this->session->userdata ( 'isall' );
          $isread = $this->session->userdata ( 'isread' );
                $iscreate = $this->session->userdata ( 'iscreate' );
        $isedit = $this->session->userdata ( 'isedit' );
        $isdelete = $this->session->userdata ( 'isdelete' );


        foreach ($list as $promo) {
            $no++;
            $row = array();
            $row[] = $promo->name;
            $row[] = $promo->description;
            $row[] = $promo->kode_promo;
            $row[] = $promo->start_promo;
            $row[] = $promo->end_promo;
            $row[] = $promo->potongan_promo;
            $row[] = $promo->createdAt;
            $row[] = $promo->updatedAt;


            //add html for action
              if($role == 'Admin' || $role == 'admin' || $isall == "1"){ 
            $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_promo/addpromo/'."".$promo->idPromo."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_promo/delete/'."".$promo->idPromo."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
             }else if($isedit == "1" && $isdelete == "0"){
                 $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_promo/addpromo/'."".$promo->idPromo."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
               }else if($isedit == "1" && $isdelete == "1"){
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_promo/addpromo/'."".$promo->idPromo."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_promo/delete/'."".$promo->idPromo."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                 }else if($isedit == "0" && $isdelete == "1"){
                     $row[] = '
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_promo/delete/'."".$promo->idPromo."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->promo->count_all(),
                        "recordsFiltered" => $this->promo->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add promo
    public function addpromo($idPromo = null){
        $idPromoInt = (int) $idPromo;
        $this->global['pageTitle'] = 'Manage Add promo';
        if($idPromo != null){
            $data['promo'] = $this->promo->get_by_id($idPromoInt);
           // $data['url_image'] = base_url(). 'assets/uploads/promo/'. $data['promo']->image;
        }else{
            $data['promo'] = null;
        }


        $data['type'] = array("mainpromo"=>"Main promo","gambarbarcode"=>"Gambar Barcode", "promoaplikasi" => "Promo Aplikasi",  "partners" => "Partners", "logo" => "logo", "dealpopular" => "Dealpopular", "playstore" => "playstore"); 

        $this->global['pageTitle'] = 'Manage Add promo';
            

        $this->loadViews("manage_promo/addpromo", $this->global , $data, NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'kode_promo' => $this->input->post('kode_promo'),
                'start_promo' => date("Y-m-d H:i:s"),
                'end_promo' => date("Y-m-d H:i:s"),
                'potongan_promo' => $this->input->post('potongan_promo'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );


        //file upload code 
        //set file upload settings 
        $config['upload_path']          = APPPATH. '../assets/uploads/promo/';
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
 
                if($this->input->post('idPromo') != NULL){ // FOR UPDATE
                    if($this->promo->update(array('idPromo' => $this->input->post('idPromo')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data promo');
                        redirect('manage_promo/');
                    }
                }else{
                    if($this->promo->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add promo');
                        redirect('manage_promo/');
                    }
                }
            }

        }else{
            if($this->input->post('idPromo') != NULL){ // FOR UPDATE
                if($this->promo->update(array('idPromo' => $this->input->post('idPromo')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data promo');
                    redirect('manage_promo/');
                }
            }else{
                if($this->promo->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add promo');
                    redirect('manage_promo/');
                }
            } 
        }
        
    }



    // delete
    public function delete($idPromo)
    {
        $this->promo->delete_by_id($idPromo);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_promo/');
    }


}

?>