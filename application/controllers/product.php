<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class product extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
         session_start();
    }
    
    // page index
    public function hotel()
    {
        $this->global['pageTitle'] = 'product hotel | train | pesawat';

        $this->load->model('product_model','product');
        $this->load->model('banner_model','banner');


        $product_hotel = $this->product->main_hotel($this->input->get('destination')); // get data banner
        $banner = $this->banner->main_banner(); // get data banner
        $logo = $this->banner->main_logo(); 
        


        $dataOrder = array(
                    'checkIn' => $this->input->get('checkIn'),
                   'checkOut'  => $this->input->get('checkOut'),
                   'total_guest' => $this->input->get('quantguest'),
                   'total_room' => $this->input->get('quantroom')


               );
        $this->session->set_userdata('order_detail',$dataOrder);



        if($this->input->get('checkIn') == null || $this->input->get('checkIn') == '' || $this->input->get('checkOut') == '' || $this->input->get('checkOut') == null || $this->input->get('quantguest') == null || $this->input->get('quantguest') == '' || $this->input->get('quantroom') == '' || $this->input->get('quantroom') == null){
            $this->session->set_flashdata('error', 'Please complete form search hotel');
            redirect('home/index/');
        }else{

             $dataImage = [];
             $dataImage['data_hotel'] = $product_hotel;
             $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
               $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
             // var_dump($data[0]->image);
            $this->loadViewsFrontend("frontend/hotellist", $this->global, $dataImage , NULL);
        }

    }



    // page index
    public function hotel_detail($id)
    {
        $this->global['pageTitle'] = 'detail product hotel | train | pesawat';

        $this->load->model('product_model','product');
        $this->load->model('banner_model','banner');


        $product_hotel = $this->product->hotel_detail($id); // get data banner
        $banner = $this->banner->main_banner(); // get data banner
        $logo = $this->banner->main_logo(); 


        $our_fasilitas = explode(',', $product_hotel[0]->fasilitas_id);
        $this->session->set_userdata('product_gambar',$product_hotel[0]->image);

  

         $dataImage = [];
         $dataImage['data_detail'] = $product_hotel;
         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
         $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         $dataImage['fasilitas'] = $our_fasilitas;
         
         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/hoteldetail", $this->global, $dataImage , NULL);

    }



    
}

?>