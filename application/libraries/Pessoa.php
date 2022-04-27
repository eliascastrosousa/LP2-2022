<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/dao/Dao.php';

class Pessoa extends Dao {

    function __construct(){
        parent::__construct('pessoa');
    }

    /*
        public function create($data){
            $this->db->insert('pessoa', $data);
            return $this->db->insert_id();
        } 
    */
}