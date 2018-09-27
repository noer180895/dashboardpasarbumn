<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_product extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model','product');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('upload');

    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage Product';
        $this->loadViews("manage_product/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->product->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();

          $role = $this->session->userdata ( 'role' );
        $isall = $this->session->userdata ( 'isall' );
          $isread = $this->session->userdata ( 'isread' );
                $iscreate = $this->session->userdata ( 'iscreate' );
        $isedit = $this->session->userdata ( 'isedit' );
        $isdelete = $this->session->userdata ( 'isdelete' );


        foreach ($list as $product) {
            $no++;
            $row = array();
            $row[] = $product->name;
            $row[] = $product->type;
            $row[] = $product->location_name;
            $row[] = $product->price;
            $row[] = $product->createdAt;
            $row[] = $product->updatedAt;



            //add html for action

             if($role == 'Admin' || $role == 'admin' || $isall == "1"){ 
            $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_product/addproduct/'."".$product->productId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_product/delete/'."".$product->productId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
             }else if($isedit == "1" && $isdelete == "0"){
                  $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_product/addproduct/'."".$product->productId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
             }else if($isedit == "1" && $isdelete == "1"){
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_product/addproduct/'."".$product->productId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_product/delete/'."".$product->productId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
             }else if($isedit == "0" && $isdelete == "1"){
                 $row[] = '<a class="btn btn-sm btn-danger" href="'.$base_url.'manage_product/delete/'."".$product->productId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->product->count_all(),
                        "recordsFiltered" => $this->product->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add product
    public function addproduct($productId = null){
        $productIdInt = (int) $productId;
        $this->global['pageTitle'] = 'Manage Add product';
        if($productId != null){
            $data['product'] = $this->product->get_by_id($productIdInt);
            $data['url_image'] = base_url(). 'assets/uploads/product/'. $data['product']->image0;
        }else{
            $data['product'] = null;
        }


        $data['type'] = array("train"=>"Train","hotel"=>"Hotel", "pesawat" => "Pesawat"); 


        $data['fasilitas'] = array("wifi","coffeebreak", "swimingpool"); 

        $this->global['pageTitle'] = 'Manage Add product';
            

        $this->loadViews("manage_product/addproduct", $this->global , $data, NULL);
    }



    //save data
    public function save()
    {

        

        // if($this->input->post('fasilitas_id') != null){
        //     $dataImplode = implode(",",$this->input->post('fasilitas_id'));    
        // }else{
        //     $dataImplode = NULL;
        // }



        $data = array(
                'name' => $this->input->post('name'),
                'location_name' => $this->input->post('location_name'),
                'lat' => $this->input->post('lat'),
                'long' => $this->input->post('long'),
                'type' => $this->input->post('type'),
                'description' => $this->input->post('description'),
                'disc' => $this->input->post('disc'),
                'price' => $this->input->post('price'),
                'fasilitas1' => $this->input->post('fasilitas0'),
                'fasilitas2' => $this->input->post('fasilitas1'),
                'fasilitas3' => $this->input->post('fasilitas2'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );


        //file upload code 
        //set file upload settings 
        $config['upload_path']          = APPPATH. '../assets/uploads/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']      = '800000000';
        $config['overwrite']     = FALSE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($_FILES['userfile']['name'][0] != "") {

                $files = $_FILES;
                $cpt = count($_FILES['userfile']['name']);

                if($cpt > 5) {
                     $this->session->set_flashdata('error', 'Cannot Upload greather than 5 image');
                      redirect('manage_product/addproduct');
                }else{

                      for($i=0; $i<$cpt; $i++)
                        {         
                            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    



                            $this->upload->do_upload();

     
                            //get the uploaded file name
                            $data['image' . '' . $i . '' ] = $files['userfile']['name'][$i];

                        }
                }

                   
     
                if($this->input->post('productId') != NULL){ // FOR UPDATE
                    if($this->product->update(array('productId' => $this->input->post('productId')), $data)){
                        $this->session->set_flashdata('success', 'Success Update Data product');
                        redirect('manage_product/');
                    }
                }else{
                    if($this->product->save($data)){ //   FOR POST
                        $this->session->set_flashdata('success', 'Success Add product');
                        redirect('manage_product/');
                    }
                }
                
            

        }else{
            if($this->input->post('productId') != NULL){ // FOR UPDATE
                if($this->product->update(array('productId' => $this->input->post('productId')), $data)){
                    $this->session->set_flashdata('success', 'Success Update Data product');
                    redirect('manage_product/');
                }
            }else{
                if($this->product->save($data)){ //   FOR POST
                    $this->session->set_flashdata('success', 'Success Add product');
                    redirect('manage_product/');
                }
            } 
        }
        
    }



    // delete
    public function delete($productId)
    {
        $this->product->delete_by_id($productId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_product/');
    }


}

?>