<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class product extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    // page index
    public function hotel()
    {
        $this->global['pageTitle'] = 'product hotel | train | pesawat';

        $this->load->model('product_model','product');
        $this->load->model('banner_model','banner');


        $product_hotel = $this->product->main_hotel(); // get data banner
        $banner = $this->banner->main_banner(); // get data banner
        $logo = $this->banner->main_logo(); 
        


         $dataImage = [];
         $dataImage['data_hotel'] = $product_hotel;
         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
           $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/hotellist", $this->global, $dataImage , NULL);

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
        


         $dataImage = [];
         $dataImage['data_detail'] = $product_hotel;
         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
         $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         
         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/hoteldetail", $this->global, $dataImage , NULL);

    }



    
}

?>