<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/dao/Dao.php';

class Telefone extends Dao {

    function __construct(){
        parent::__construct('telefone');
    }

    /*
        public function create($data){
            $this->db->insert('telefone', $data);
            return $this->db->insert_id();
        }
    */
}