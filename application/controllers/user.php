<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class User extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_model','admin');
         $this->load->model('login_model');


        
    }

    public function dashboard(){
        $this->load->model('transaction_model','transaction');

        $userId = $this->session->userdata('userId');


        $data=[];
        $data['transaction_list'] = $this->transaction->transaction_list($userId);
        $data['transaction_list_success'] = $this->transaction->transaction_list_success($userId);
        $this->loadViewsFrontend("frontend/dashboard", $this->global, $data , NULL);
    }


     public function purchaselist(){
        $this->load->model('transaction_model','transaction');

        $userId = $this->session->userdata('userId');


        $data=[];
        $data['transaction_list'] = $this->transaction->transaction_list_all($userId);

        $this->loadViewsFrontend("frontend/purchaselist", $this->global, $data , NULL);
    }


    // public function editprofile(){
    //     $this->load->model('user_model','user');

    //     $userId = $this->session->userdata('userId');


    //     $data=[];
    //     $data['profile'] = $this->user->profile($userId);
    //     $this->loadViewsFrontend("frontend/editprofile", $this->global, $data , NULL);
    // }


    // public function updateprofile()
    // {
    //     $this->load->model('user_model','user');


    //     $userId = $this->session->userdata('userId');

    //     $data = [];

    //     if($this->input->post('email') != null && $this->input->post('fullname') != null && $this->input->post('phonenumber') != null){
    //         $data = array(
    //             'email' => $this->input->post('email'),
    //              'phone' => $this->input->post('phonenumber'),
    //               'username' => $this->input->post('fullname'),
    //             'createdAt' => date("Y-m-d H:i:s"),
    //             'updatedAt' => date("Y-m-d H:i:s"),
    //         );
    //     }else if($this->input->post('email') != null){
    //            $data = array(
    //             'email' => $this->input->post('email'),
    //             'createdAt' => date("Y-m-d H:i:s"),
    //             'updatedAt' => date("Y-m-d H:i:s"),
    //         );
    //     }else if($this->input->post('phonenumber') != null){
    //           $data = array(
    //             'phone' => $this->input->post('phonenumber'),
    //             'createdAt' => date("Y-m-d H:i:s"),
    //             'updatedAt' => date("Y-m-d H:i:s"),
    //         );
    //       }else if($this->input->post('fullname') != null){
    //           $data = array(
    //               'username' => $this->input->post('fullname'),
    //             'createdAt' => date("Y-m-d H:i:s"),
    //             'updatedAt' => date("Y-m-d H:i:s"),
    //         );
    //     }

    //     $this->user->updateprofile($userId, $data);

    //     $this->session->set_flashdata('success', 'Success  Update Profile ');
    //     redirect('user/editprofile/');
    // }


      public function editprofile(){
        $this->load->model('user_model','user');

        $userId = $this->session->userdata('userId');


        $data=[];
        $data['profile'] = $this->user->profile($userId);
        $this->loadViewsFrontend("frontend/editprofile", $this->global, $data , NULL);
    }


    public function updateprofile()
    {
        $this->load->model('user_model','user');


        $userId = $this->session->userdata('userId');

        $data = [];

        
        
        if($this->input->post('email') != null && $this->input->post('fullname') != null && $this->input->post('phonenumber') != null){
            $data = array(
                'email' => $this->input->post('email'),
                 'phone' => $this->input->post('phonenumber'),
                  'username' => $this->input->post('fullname'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
        }else if($this->input->post('email') != null){
              $data = array(
                'email' => $this->input->post('email'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
        }else if($this->input->post('phonenumber') != null){
              $data = array(
                'phone' => $this->input->post('phonenumber'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
          }else if($this->input->post('fullname') != null){
              $data = array(
                  'username' => $this->input->post('fullname'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
        }

        $this->user->updateprofile($userId, $data);

        $this->session->set_flashdata('success', 'Success  Update Profile ');
        redirect('user/editprofile/');
    }


    public function user_login(){

        $this->loadViewsFrontend("frontend/user_login", $this->global, NULL , NULL);
    }


    public function login(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|xss_clean|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|');
        
        if($this->form_validation->run() == FALSE)
        {
            redirect('/user/user_login');

        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $result = $this->login_model->loginMe($email, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('userId'=>$res->userId,                    
                                            'role'=>$res->roleId,
                                            'roleText'=>$res->role,
                                            'username'=>$res->username,
                                            'isLoggedIn' => TRUE
                                    );
                                    
                    $this->session->set_userdata($sessionArray);

             
                    
                    redirect('/home');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                redirect('/user/user_login');
            }
        }
    }


    public function user_register(){
        $this->loadViewsFrontend("frontend/user_register", $this->global, NULL , NULL);
    }

    public function save_register(){
         $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'password' => getHashedPassword($this->input->post('password')),
                'email' => $this->input->post('email'),
                'roleId' => 3, // 3 for role user
                'isActive' => 1,
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
        
        
        $this->admin->save($data);
        $this->session->set_flashdata('success', 'Success Register');
        redirect('user/user_register/');
        
    }


    public function logout() {
        $this->session->sess_destroy ();
        redirect ('home');
    }


     public function logoutuser() {
        $this->session->sess_destroy ();
        redirect ('login');
    }


    
    public function index()
    {
        $this->isLoggedIn();   
        $this->global['pageTitle'] = 'TIP : Dashboard';
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    function userListing()
    {   
        $this->isLoggedIn();   
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->user_model->userListingCount($searchText);
			$returns = $this->paginationCompress ( "userListing/", $count, 5 );
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'TIP : User Listing';
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }

   function customerListing()
    {
        $this->isLoggedIn();   
        $this->load->model('admin_model');
        $searchText = $this->input->post('searchText');
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->admin_model->customerListingCount($searchText);
        $returns = $this->paginationCompress ( "customerListing/", $count, 5 );
        $data['customerRecords'] = $this->admin_model->customerListing($searchText, $returns["page"], $returns["segment"]);
        $this->global['pageTitle'] = 'TIP : Customer Listing';
        $this->loadViews("customer", $this->global, $data, NULL);
    }

    
    function addNew()
    {
        $this->isLoggedIn();   
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();     
            $this->global['pageTitle'] = 'TIP : Add New User';
            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    public function generateKode()
    {
        $this->isLoggedIn();   
        $roleId = $this->input->post('role');
        $kode = $this->user_model->generateKode($roleId);
        echo json_encode(array('kode' => $kode));
    }
    

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $this->isLoggedIn();   
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        $this->isLoggedIn();   
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[11]|max_length[12]|xss_clean');
            $this->form_validation->set_rules('address','Address','trim|required');
            $this->form_validation->set_rules('zipcode','Zipcode','trim|required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $id = ($this->db->query("SELECT * FROM tbl_users order by userId desc")->row()->userId)+1;
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                $nik = $this->input->post('nik');
                $zipcode = $this->input->post('zipcode');
                $address = $this->input->post('address');

                $data = array(
                    'email'=>$email, 
                    'password'=>getHashedPassword($password), 
                    'roleId'=>$roleId, 
                    'name'=> $name,
                    'mobile'=>$mobile, 
                    'createdBy'=>$this->vendorId, 
                    'createdDtm'=>date('Y-m-d H:i:s'));
                    
                $data1 = array(
                    'employeeid' => $id,
                    'nik'=> $nik,
                    'name'=> $name,
                    'email'=>$email, 
                    'address'=> $address,
                    'zipcode'=> $zipcode,
                    'mobile'=> $mobile
                    );
                $this->load->model('user_model');    
                $result = $this->user_model->get_insert($data, $data1);          
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('addNew');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        $this->isLoggedIn();   
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'TIP : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        $this->isLoggedIn();   
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
        $userId = $this->input->post('userId');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
        $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
        $this->form_validation->set_rules('role','Role','trim|required|numeric');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[11]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('zipcode','Zipcode','trim|required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                $nik = $this->input->post('nik');
                $zipcode = $this->input->post('zipcode');
                $address = $this->input->post('address');

                if(empty($password))
                {
                    $data = array(
                    'email'=>$email, 
                    'roleId'=>$roleId, 
                    'name'=>$name,
                    'mobile'=>$mobile, 
                    'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s')
                    );

                    $data1 = array(
                    'nik'=> $nik,
                    'name'=> $name,
                    'email'=>$email, 
                    'address'=> $address,
                    'zipcode'=> $zipcode,
                    'mobile'=> $mobile
                    );
                }
                else
                {
                    $data = array(
                    'email'=>$email, 
                    'password'=>getHashedPassword($password), 
                    'roleId'=>$roleId,
                    'name'=>ucwords($name), 
                    'mobile'=>$mobile, 
                    'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s')
                    );

                    $data1 = array(
                    'nik'=> $nik,
                    'name'=> $name,
                    'email'=>$email, 
                    'address'=> $address,
                    'zipcode'=> $zipcode,
                    'mobile'=> $mobile
                    );

                }
                
                $result = $this->user_model->editUser($data, $data1, $userId, $nik);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        $this->isLoggedIn();   
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->isLoggedIn();   
        $this->global['pageTitle'] = 'TIP : Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->isLoggedIn();   
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'TIP : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>