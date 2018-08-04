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

         $data = $this->banner->list_banner(); // get data banner


         $dataBanner = [];
         $dataBanner['url_banner'] = base_url() . '/assets/uploads/banner/' . $data[0]->image;

         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/index", $this->global, $dataBanner , NULL);
    }



    
}

?>