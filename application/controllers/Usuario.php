<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Usuario extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('UsuarioModel', 'user');
    }

    public function index(){
        $v['table'] = $this->user->list();
        $html = $this->load->view('user/list_user');
        $this->show($html);
    }

    public function cadastro(){
        $this->user->create();

        $html = $this->load->view('user/form_user', null, true);
        $this->show($html);
    }

    public function editar($id){
        $_POST = $this->user->load($id);
        $html = $this->load->view('user/form_user', null, true);
        $this->show($html);
    }

}