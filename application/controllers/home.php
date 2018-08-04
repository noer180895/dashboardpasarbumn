<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class home extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage admin';

         $this->load->model('banner_model','banner');

        $banner = $this->banner->main_banner(); // get data banner
        $barcode = $this->banner->main_barcode(); // get data banner
         $promo = $this->banner->main_promo(); // get data banner
         $partner = $this->banner->main_partner(); 
         $logo = $this->banner->main_logo(); 
         $dealpopular = $this->banner->main_dealpopular();


         $dataImage = [];
         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
         $dataImage['url_barcode'] = base_url() . '/assets/uploads/banner/' . $barcode[0]->image;
         $dataImage['url_promoaplikasi'] = base_url() . '/assets/uploads/banner/' . $promo[0]->image;
         $dataImage['url_partner'] = $partner;
         $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         $dataImage['url_dealpopular'] = $dealpopular;
         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/index", $this->global, $dataImage , NULL);
    }



    
}

?>