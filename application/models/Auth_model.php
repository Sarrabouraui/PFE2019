<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');
class Auth_model extends CI_Model{
    public function __construct ()
    {
        parent::__construct();
    }
    public function login($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $q = $this->db->get('project.users');
        if ($q->num_rows()>0){
            return true;
        }else
        {
            return false;
        }
    }

    
}