<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class transaction extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    // page index
    public function order_hotel($productId)
    {
        $this->global['pageTitle'] = 'transaction hotel | train | pesawat';

        $this->load->model('transaction_model','transaction');
        
        $dataOrder = array(
                   'id_product'  => 3
               );
        $this->session->set_userdata('order',$dataOrder);



         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/orderbooking", $this->global, NULL , NULL);

    }


    
}

?>