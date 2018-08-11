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
        $this->load->model('product_model','product');
        
        $dataOrder = array(
                   'id_product'  => $productId
               );
        $this->session->set_userdata('order',$dataOrder);


        $product_hotel = $this->product->hotel_detail($productId); // get data banner
        $dataImage = [];
        $dataImage['data_detail'] = $product_hotel;


         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/orderbooking", $this->global, $dataImage , NULL);

    }


    public function order_review()
    {
        $this->global['pageTitle'] = 'transaction hotel | train | pesawat';

        $this->load->model('transaction_model','transaction');
        $this->load->model('product_model','product');




        $dataOrder = array(
                    'id_product' => $this->input->post('productId'),
                   'contact_name'  => $this->input->post('contact_name'),
                   'phone'  => $this->input->post('phone'),
                   'email'  => $this->input->post('email'),
                   'isguest'  => $this->input->post('isguest'),
                   'fullname'  => $this->input->post('fullname')


               );
        $this->session->set_userdata('order',$dataOrder);


        $productId = $this->input->post('productId');

        $product_hotel = $this->product->hotel_detail($productId); // get data banner
        $dataImage = [];
        $dataImage['data_detail'] = $product_hotel;


         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/orderreview", $this->global, $dataImage , NULL);

    }


    
}

?>