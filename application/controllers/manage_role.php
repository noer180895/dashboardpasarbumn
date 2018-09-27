<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class manage_role extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('role_model','rolemodel');
        $this->isLoggedIn();   
        $this->load->library('pagination');
        $this->load->helper('url');
    }
    
    // page index
    public function index()
    {
        $this->global['pageTitle'] = 'Manage role';
        $this->loadViews("manage_role/index", $this->global, NULL , NULL);
    }



    public function ajax_list()
    {
        $list = $this->rolemodel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $base_url = base_url();


        foreach ($list as $role) {
            $no++;
            $row = array();
            $row[] = $role->role;
            $row[] = $role->is_all == 1 ? 'Yes' : 'No'; 
            $row[] = $role->is_delete == 1 ? 'Yes' : 'No';
            $row[] = $role->is_edit == 1 ? 'Yes' : 'No';
            $row[] = $role->is_read == 1 ? 'Yes' : 'No';
            $row[] = $role->is_create == 1 ? 'Yes' : 'No';
            $row[] = $role->createdAt;
            $row[] = $role->updatedAt;



            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="'.$base_url.'manage_role/addrole/'."".$role->roleId."".'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="'.$base_url.'manage_role/delete/'."".$role->roleId."".'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->rolemodel->count_all(),
                        "recordsFiltered" => $this->rolemodel->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    // add role
    public function addrole($roleId = null){
        $roleIdInt = (int) $roleId;
        $this->global['pageTitle'] = 'Manage Add role';
        $data['roles'] = $this->rolemodel->getUserRoles();   
        if($roleId != null){
            $data['role'] = $this->rolemodel->get_by_id($roleIdInt);
        }else{
            $data['role'] = null;
        }
        $data['status'] = array("1"=>"Active","0"=>"Unactive");

        $this->loadViews("manage_role/addrole", $this->global, $data , NULL);
    }



    //save data
    public function save()
    {
        $data = array(
                'role' => $this->input->post('role'),
                'is_all' => $this->input->post('is_all'),
                'is_create' => $this->input->post('is_create'),
                'is_edit' => $this->input->post('is_edit'),
                'is_read' => $this->input->post('is_read'),
                'is_delete' => $this->input->post('is_delete'),
                'createdAt' => date("Y-m-d H:i:s"),
                'updatedAt' => date("Y-m-d H:i:s"),
            );

        
        
        if($this->input->post('roleId') != NULL){ // FOR UPDATE

            if($this->rolemodel->update(array('roleId' => $this->input->post('roleId')), $data)){
                $this->session->set_flashdata('success', 'Success Update Data role');
                redirect('manage_role/');
            }
        }else{
            if($this->rolemodel->save($data)){ //   FOR POST
                $this->session->set_flashdata('success', 'Success Add role');
                redirect('manage_role/');
            }
        }

        
    }



    // delete
    public function delete($roleId)
    {
        $this->rolemodel->delete_by_id($roleId);
        $this->session->set_flashdata('success', 'Success  Delete');
        redirect('manage_role/');
    }


}

?>