<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Home extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('active');
    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Home';
        $this->load->model('banner_model','banner');

        $banner = $this->banner->main_banner(); // get data banner
        $barcode = $this->banner->main_barcode(); // get data banner
        $promo = $this->banner->main_promo(); // get data banner
        $partner = $this->banner->main_partner(); 
        $logo = $this->banner->main_logo(); 
        $dealpopular = $this->banner->main_dealpopular();
        $playstore = $this->banner->main_playstore();

         $dataImage = [];
         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
         $dataImage['url_barcode'] = base_url() . '/assets/uploads/banner/' . $barcode[0]->image;
         $dataImage['url_promoaplikasi'] = base_url() . '/assets/uploads/banner/' . $promo[0]->image;
         $dataImage['url_partner'] = $partner;
         $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         $dataImage['url_dealpopular'] = $dealpopular;
         $dataImage['url_playstore'] = base_url() . '/assets/uploads/banner/' . $playstore[0]->image;



         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/index", $this->global, $dataImage , NULL);

    }


    public function help()
    {
        $this->global['pageTitle'] = 'Manage admin';

         $this->load->model('banner_model','banner');
         $this->load->model('help_model','help');

         $data_helps = $this->help->main_help(); // get data banner
         $banner = $this->banner->main_banner(); // get data banner
         $barcode = $this->banner->main_barcode(); // get data banner
         $promo = $this->banner->main_promo(); // get data banner
         $partner = $this->banner->main_partner(); 
         $logo = $this->banner->main_logo(); 
         $dealpopular = $this->banner->main_dealpopular();
         $playstore = $this->banner->main_playstore();


         $dataImage = [];
         $dataImage['data_help'] = $data_helps;
         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
         $dataImage['url_barcode'] = base_url() . '/assets/uploads/banner/' . $barcode[0]->image;
         $dataImage['url_promoaplikasi'] = base_url() . '/assets/uploads/banner/' . $promo[0]->image;
         $dataImage['url_partner'] = $partner;
         $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         $dataImage['url_dealpopular'] = $dealpopular;
         $dataImage['url_playstore'] = base_url() . '/assets/uploads/banner/' . $playstore[0]->image;
         // var_dump($data[0]->image);
        $this->loadViewsFrontend("frontend/bantuan", $this->global, $dataImage , NULL);

    }  


    public function promo()
    {
        $this->global['pageTitle'] = 'Promo';

         $this->load->model('banner_model','banner');
         $this->load->model('promo_model','promo');

         $data_promos = $this->promo->main_promo(); // get data banner
         $banner = $this->banner->main_banner(); // get data banner
         $barcode = $this->banner->main_barcode(); // get data banner
         $promo = $this->banner->main_promo(); // get data banner
         $partner = $this->banner->main_partner(); 
         $logo = $this->banner->main_logo(); 
         $dealpopular = $this->banner->main_dealpopular();
         $playstore = $this->banner->main_playstore();




         $dataImage = [];
         $dataImage['data_promo'] = $data_promos;



         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
         $dataImage['url_barcode'] = base_url() . '/assets/uploads/banner/' . $barcode[0]->image;
         $dataImage['url_promoaplikasi'] = base_url() . '/assets/uploads/banner/' . $promo[0]->image;
         $dataImage['url_partner'] = $partner;
         $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         $dataImage['url_dealpopular'] = $dealpopular;
         $dataImage['url_playstore'] = base_url() . '/assets/uploads/banner/' . $playstore[0]->image;
        $this->loadViewsFrontend("frontend/promo", $this->global, $dataImage , NULL);

    }   



     public function detailpromo($id)
    {
        $this->global['pageTitle'] = 'Promo Detail';

         $this->load->model('banner_model','banner');
         $this->load->model('promo_model','promo');

         $data_promos = $this->promo->detailpromo($id); // get data banner
         $banner = $this->banner->main_banner(); // get data banner
         $barcode = $this->banner->main_barcode(); // get data banner
         $promo = $this->banner->main_promo(); // get data banner
         $partner = $this->banner->main_partner(); 
         $logo = $this->banner->main_logo(); 
         $dealpopular = $this->banner->main_dealpopular();
         $playstore = $this->banner->main_playstore();




         $dataImage = [];
         $dataImage['data_promo'] = $data_promos;



         $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;
         $dataImage['url_barcode'] = base_url() . '/assets/uploads/banner/' . $barcode[0]->image;
         $dataImage['url_promoaplikasi'] = base_url() . '/assets/uploads/banner/' . $promo[0]->image;
         $dataImage['url_partner'] = $partner;
         $dataImage['url_logo'] = base_url() . '/assets/uploads/banner/' . $logo[0]->image;
         $dataImage['url_dealpopular'] = $dealpopular;
         $dataImage['url_playstore'] = base_url() . '/assets/uploads/banner/' . $playstore[0]->image;
        $this->loadViewsFrontend("frontend/promodetail", $this->global, $dataImage , NULL);

    }   



    public function contactme(){
        $this->loadViewsFrontend("frontend/contactme", $this->global, NULL , NULL);
    }

    public function save_contact(){
         $data = array(
                'bookingid' => $this->input->post('bookingid'),
                'product_id' => $this->input->post('product_id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'description' => $this->input->post('description'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
        
        
        $this->admin->save($data);
        $this->session->set_flashdata('success', 'Success Contact');
        redirect('home/contactme/');
        
    }


     public function checkhowtoorder(){
        $this->load->model('banner_model','banner');
        $this->load->model('product_model','product');

        $banner = $this->banner->main_steporder(); 
        $steporderhotel = $this->product->steporder('hotel'); 
        $stepordertrain = $this->product->steporder('train');
        $steporderflight = $this->product->steporder('flight');
         $steporderretail = $this->product->steporder('retail');


        $dataImage = [];
        $dataImage['url_banner'] = base_url() . '/assets/uploads/banner/' . $banner[0]->image;

        $dataImage['steporderhotel'] = $steporderhotel;
        $dataImage['stepordertrain'] = $stepordertrain;
        $dataImage['steporderflight'] = $steporderflight;
        $dataImage['steporderretail'] = $steporderretail;


        $this->loadViewsFrontend("frontend/checkhowtoorder", $this->global, $dataImage , NULL);
    }
    
}

?>