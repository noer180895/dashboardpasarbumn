<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class transaction extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
         session_start();


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

        $check = $this->session->userdata('order_detail');

        $dataImage = [];
        $dataImage['data_detail'] = $product_hotel;
        $dataImage['checkIn'] =  $check['checkIn'];
         $dataImage['checkOut'] = $check['checkOut'];
           $dataImage['room'] =  $check['total_room'][2];
         $dataImage['guest'] = $check['total_guest'][1];


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

         $check = $this->session->userdata('order_detail');
        $dataorder = $this->session->userdata('order');

        $qty = 0;
        if($check['total_room'] != null || $check['total_room'] != '' ){
            $qty =  (int) $check['total_room'][2];
        }else{
            $qty=1;
        }

        $disc =0;
        $subtotal = 0;
        $price=0;
        $length = 5;


        $randomString = substr(str_shuffle("0123456789"), 0, $length);
        $no_order = '0R'. $randomString . date("Ymd");

        $product_hotel = $this->product->hotel_detail($dataorder['id_product']); // get data banner

        if($product_hotel != null){
            if($product_hotel[0]->disc != null && $product_hotel[0]->disc > 0  ){

                // var_dump($product_hotel[0]->disc / 100 );
                // var_dump((int) $product_hotel[0]->price);
                $disc = $product_hotel[0]->disc / 100 *  (int) $product_hotel[0]->price;
                $subtotal = (int) $product_hotel[0]->price * $qty - $disc;
            }else{
               $subtotal = $qty * (int) $product_hotel[0]->price;
            }
        }

        


        $dataImage = [];
        $dataImage['data_detail'] = $product_hotel;

        $dataImage['checkIn'] =  $check['checkIn'];
        $dataImage['checkOut'] = $check['checkOut'];
        $dataImage['room'] =  $check['total_room'][2];
        $dataImage['guest'] = $check['total_guest'][1];
        $dataImage['contact_name'] = $dataorder['contact_name'];
        $dataImage['total'] = $subtotal;



         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/orderreview", $this->global, $dataImage , NULL);

    }


    public function payment()
    {   

        $this->load->model('product_model','product');
        $this->load->model('transaction_model','transaction');
        $check = $this->session->userdata('order_detail');
        $dataorder = $this->session->userdata('order');

        $qty = 0;
        if($check['total_room'] != null || $check['total_room'] != '' ){
            $qty =  (int) $check['total_room'][2];
        }else{
            $qty=1;
        }

        $disc =0;
        $subtotal = 0;
        $price=0;
        $length = 5;


        $randomString = substr(str_shuffle("0123456789"), 0, $length);
        $no_order = '0R'. $randomString . date("Ymd");

        $product_hotel = $this->product->hotel_detail($dataorder['id_product']); // get data banner

        if($product_hotel != null){
            if($product_hotel[0]->disc != null && $product_hotel[0]->disc > 0  ){

                // var_dump($product_hotel[0]->disc / 100 );
                // var_dump((int) $product_hotel[0]->price);
                $disc = $product_hotel[0]->disc / 100 *  (int) $product_hotel[0]->price;
                $subtotal = (int) $product_hotel[0]->price * $qty - $disc;
            }else{
               $subtotal = $qty * (int) $product_hotel[0]->price;
            }
        }

        




        $data = array(
                'no_order' => $no_order,
                'id_product' => $dataorder['id_product'],
                'is_guest' => $dataorder['isguest'],
                'id_user' => $this->session->userdata('userId'),
                'contact_name' => $dataorder['contact_name'],
                'phone' => $dataorder['phone'],
                'email' => $dataorder['email'],
                'guest_fullname' => $dataorder['fullname'],
                'status' => 'pending',
                'qty' => $qty, // default qty
                'disc' => $disc,
                'subtotal' => $subtotal,
                'checkin' =>$check['checkIn'],
                'checkout' =>  $check['checkOut'],
                'total_guest' => $check['total_guest'][1],
                'total_room' => $qty,
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
        


        $dataImage = [];
        $dataImage['data_detail'] = $product_hotel;


        $dataImage['checkIn'] =  $check['checkIn'];
        $dataImage['checkOut'] = $check['checkOut'];
        $dataImage['room'] =  $check['total_room'][2];
        $dataImage['guest'] = $check['total_guest'][1];
        $dataImage['contact_name'] = $dataorder['contact_name'];
        $dataImage['total'] = $subtotal;



        $this->transaction->save($data);
        $this->session->set_flashdata('success', 'Success Order');

        // clear cache data order



        $this->loadViewsFrontend("frontend/orderreview", $this->global, $dataImage , NULL);
    
    }

    public function check_order()
    {
        $this->global['pageTitle'] = 'transaction hotel | train | pesawat';

        

         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/check_order", $this->global, NULL , NULL);

    }

     public function check_order_detail()
    {
        $this->global['pageTitle'] = 'detail order hotel | train | pesawat';

        

        $this->load->model('transaction_model','transaction');
        $this->load->model('banner_model','banner');




        $transaction = $this->transaction->transaction_detail($this->input->get('search')); // get data banner
        $logo = $this->banner->main_logo(); 

  

        $dataImage = [];
        $dataImage['data_detail'] = $transaction;
        $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;

         
         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/checkorderdetail", $this->global, $dataImage , NULL);

    }



    public function detailorder($no_order)
    {
        $this->global['pageTitle'] = 'detail order hotel | train | pesawat';

        

        $this->load->model('transaction_model','transaction');
        $this->load->model('banner_model','banner');




        $transaction = $this->transaction->transaction_detail($no_order); // get data banner
        $logo = $this->banner->main_logo(); 

  

        $dataImage = [];
        $dataImage['data_detail'] = $transaction;
        $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;

         
         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/detailorder", $this->global, $dataImage , NULL);

    }
    
}

?>