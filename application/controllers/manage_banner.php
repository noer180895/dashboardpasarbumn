<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_banner extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner_model','banner');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage banner';
        $this->loadViews("manage_banner/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->banner->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


        foreach ($list as $banner) {
            $no++;
            $row = array();
            $row[] = $banner->name;
            $row[] = $banner->type;
            $row[] = $banner->createdAt;
            $row[] = $banner->updatedAt;



            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_banner/addbanner/'."".$banner->bannerId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_banner/delete/'."".$banner->bannerId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->banner->count_all(),
                        "recordsFiltered" => $this->banner->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add banner
    public function addbanner($bannerId = null){
        $bannerIdInt = (int) $bannerId;
        $this->global['pageTitle'] = 'Manage Add Banner';
        if($bannerId != null){
            $data['banner'] = $this->banner->get_by_id($bannerIdInt);
            $data['url_image'] = base_url(). 'assets/uploads/banner/'. $data['banner']->image;
        }else{
            $data['banner'] = null;
        }


        $data['type'] = array("mainbanner"=>"Main Banner","gambarbarcode"=>"Gambar Barcode", "promoaplikasi" => "Promo Aplikasi",  "partners" => "Partners", "logo" => "logo");

        $this->global['pageTitle'] = 'Manage Add banner';
        

        $this->loadViews("manage_banner/addbanner", $this->global , $data, NULL);
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
        $config['upload_path']          = APPPATH. '../assets/uploads/banner/';
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
 
                if($this->input->post('bannerId') != NULL){ // FOR UPDATE
                    if($this->banner->update(array('bannerId' => $this->input->post('bannerId')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data banner');
                        redirect('manage_banner/');
                    }
                }else{
                    if($this->banner->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add banner');
                        redirect('manage_banner/');
                    }
                }
            }

        }else{
            if($this->input->post('bannerId') != NULL){ // FOR UPDATE
                if($this->banner->update(array('bannerId' => $this->input->post('bannerId')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data banner');
                    redirect('manage_banner/');
                }
            }else{
                if($this->banner->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add banner');
                    redirect('manage_banner/');
                }
            } 
        }
        
    }



    // delete
    public function delete($bannerId)
    {
        $this->banner->delete_by_id($bannerId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_banner/');
    }


}

?>