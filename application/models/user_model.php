<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    var $table = 'tbl_users'; //buat variabel tabel
    var $table1 = 'tbl_employee'; 
    var $table2 = 'tbl_customer';
    
    function userListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.userId, Emp.nik, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Emp.address, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_employee as Emp', 'Emp.email = BaseTbl.email','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->order_by("BaseTbl.userId","ASC");
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    function userListing($searchText = '', $page, $segment)
    {
       $this->db->select('BaseTbl.userId, Emp.nik, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Emp.address, Role.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_employee as Emp', 'Emp.email = BaseTbl.email','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%'
                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
       $this->db->order_by("BaseTbl.userId","ASC");
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function customerListingCount($searchText = '')
    {
        $query = $this->db->get('tbl_customer');
        
        return count($query->result());
    }
    
    function customerListing($searchText = '', $page, $segment)
    {
        $this->db->limit($page, $segment);
        $query = $this->db->get('tbl_customer');
        
        $result = $query->result();        
        return $result;
    }

    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $query = $this->db->get();
        
        return $query->result();
    }

    public function generateKode($roleId)
    {
        $curYear = date('Y'); 
        $data = $this->db->query("select MAX(RIGHT(nik, 4)) codeMax FROM tbl_employee INNER JOIN tbl_users ON tbl_employee.employeeid = tbl_users.userId WHERE tbl_users.roleId = '$roleId'");
        if($data->num_rows() > 0){
            $obj = $data->row();
            $tmp = ((int)$obj->codeMax) + 1;
            $code = sprintf("%04s", $tmp);
        }
        
       
        if($roleId == '1'){
            $roleId = 'ADM-';
            $format = $roleId.$curYear.$code;
        }
        elseif($roleId == '2')
        {
            $roleId = 'MNG-';
           $format = $roleId.$curYear.$code;
        }
        elseif($roleId == '3')
        {
            $roleId = 'SDM-';
            $format = $roleId.$curYear.$code;
        }
        elseif($roleId == '4')
        {
            $roleId = 'PRD-';
            $format = $roleId.$curYear.$code;
        }
        elseif($roleId == '0')
        {
            $format = '';
        }
        return $format;
    }

    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email); 
        $query = $this->db->get();

        return $query->result();
    }
    
    
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    function get_insert($data, $data1){
       $this->db->trans_start();
       $this->db->insert($this->table, $data);
       $this->db->insert($this->table1, $data1);
       $this->db->trans_complete();
       
       return TRUE;
    }
    
    function getUserInfo($userId)
    {
        $this->db->select('BaseTbl.userId, Emp.employeeid, Emp.nik, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, Emp.address, Role.role, BaseTbl.roleId, Emp.zipcode');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        $this->db->join('tbl_employee as Emp', 'Emp.email = BaseTbl.email','left');
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    function editUser($data, $data1, $userId, $nik)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $data);
        //second
        $this->db->where('nik', $nik);
        $this->db->update('tbl_employee', $data1);
        
        return TRUE;
    }

    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }


    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }
}

  