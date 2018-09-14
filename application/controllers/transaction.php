<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
require APPPATH . '/libraries/Doku/Initiate.php';
require APPPATH . '/libraries/Doku/Library.php';
require APPPATH . '/libraries/Doku/Api.php';



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


        $productId = $this->input->post('productId');
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


        if($product_hotel != null){
            if($product_hotel[0]->disc != null && $product_hotel[0]->disc > 0  ){
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
        $dataImage['subtotal'] = $subtotal;


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
                   'address' => $this->input->post('address'),
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
                'id_payment' => 1,
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







        if($this->transaction->save($data)){
            // doku payment integrasi
            date_default_timezone_set('Asia/Jakarta');
            Doku_Initiate::$sharedKey = '6nVo4l9q4VEY' ;
            Doku_Initiate::$mallId = '5537';

            $params = array('amount' => $subtotal, 'invoice' => $no_order, 'currency' => '360');
            $words = Doku_Library::doCreateWords($params);  


            $basket = $product_hotel[0]->name .','. $product_hotel[0]->price . ',' . $qty . ',' . $subtotal . ',';


            $customer = array('name' => $dataorder['contact_name'],'data_phone' => $dataorder['phone'], 'data_email' => $dataorder['email'], 'data_address' => $dataorder['address']);
            $dataPayment = array('req_mall_id' => '5537', 'req_chain_merchant' => 'NA', 'req_amount' => $subtotal, 'req_words' => $words, 'req_trans_id_merchant' => $no_order, 'req_purchase_amount' => $subtotal, 'req_request_date_time' => date('YmdHis'), 'req_session_id' => sha1(date('YmdHis')), 'req_email' => $dataorder['email'], 'req_name' => $dataorder['fullname'], 'req_basket' => $basket, 'req_address' => $dataorder['address'], 'req_mobile_phone' => $dataorder['phone'], 'req_expiry_time' => '360');


            $response = Doku_Api::doGeneratePaycode($dataPayment);



            if($response->res_response_code == '0000'){
                    
                // update status transaction
                // $data = array('status' => 'success');
                // $this->transaction->update(array('no_order' => $no_order), $data);


                $dataOrder = array(
                   'payment_code'  => $response->res_pay_code,
                   'amount' => $subtotal
                );
                $this->session->set_userdata('orderpayment',$dataOrder);


                $this->session->set_flashdata('success', 'Success Order');
                redirect('transaction/paymentfinish/');

            }else{
               $this->session->set_flashdata('error', 'Failed Order');     
            }

            


        }

        // clear cache data order



        $this->loadViewsFrontend("frontend/orderreview", $this->global, $dataImage , NULL);
    
    }



    public function paymentfinish()
    {
        $this->global['pageTitle'] = 'payment finish transaction hotel | train | pesawat';

        $orderpayment = $this->session->userdata('orderpayment');


        $data = [];
        $data['payment'] = $orderpayment;

         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/paymentfinish", $this->global, $data , NULL);

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