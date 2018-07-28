<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_admin extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model','admin');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage admin';
        $this->loadViews("manage_admin/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->admin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


        foreach ($list as $admin) {
            $no++;
            $row = array();
            $row[] = $admin->username;
            $row[] = $admin->email;
            $row[] = $admin->role;
            $row[] = $admin->isActive === '1' ? 'Active' : 'Non Active';
            $row[] = $admin->createdAt;
            $row[] = $admin->updatedAt;



            //add html for action
            if($admin->isActive === '1') {
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_admin/addadmin/'."".$admin->userId."".'" title="Edit">Edit</a>
                  <a class="btn btn-sm btn-success" href="'.$base_url.'manage_admin/update/'."".$admin->userId."".'/0" title="nonaktif">Nonaktifkan</a>' ;

            }else{
                $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_admin/addadmin/'."".$admin->userId."".'" title="Edit">Edit</a> 
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_admin/update/'."".$admin->userId."".'/1" title="nonaktif">Aktifkan</a>' ;
            }
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->admin->count_all(),
                        "recordsFiltered" => $this->admin->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add admin
    public function addadmin($userId = null){
        $userIdInt = (int) $userId;
        $this->global['pageTitle'] = 'Manage Add Admin';
        $data['roles'] = $this->admin->getUserRoles();   
        if($userId != null){
            $data['admin'] = $this->admin->get_by_id($userIdInt);
        }else{
            $data['admin'] = null;
        }
        $data['status'] = array("1"=>"Active","0"=>"Unactive");

        $this->loadViews("manage_admin/addadmin", $this->global, $data , NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'password' => getHashedPassword($this->input->post('password')),
                'email' => $this->input->post('email'),
                'roleId' => $this->input->post('roleId'),
                'isActive' => $this->input->post('isActive'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );
        
        
        if($this->input->post('userId') != NULL){ // FOR UPDATE
            $this->admin->update(array('userId' => $this->input->post('userId')), $data);
            $this->session->set_flashdata('success', 'Success Update Data Admin');
                redirect('manage_admin/');
            
        }else{
            $this->admin->save($data);
            $this->session->set_flashdata('success', 'Success Add Admin');
            redirect('manage_admin/');
        }

        
    }



    // delete
    public function delete($userId)
    {
        $this->admin->delete_by_id($userId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_admin/');
    }


    public function update($userId,$type)
    {
        $data = array(
                'isActive' => $type,
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );

        $this->admin->update(array('userId' => $userId), $data);

        $this->session->set_flashdata('success', 'Success  Non Active User');
        redirect('manage_admin/');
    }



    //check email existing validation
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->admin->checkEmailExists($email);
        } else {
            $result = $this->admin->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
}

?>