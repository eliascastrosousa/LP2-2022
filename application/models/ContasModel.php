<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/component/Table.php';

class ContasModel extends CI_Model{

    public function __construct(){
        $this->load->library('conta', '', 'bill');
    }

    public function listaCompleta() {
        $m = $this->bill->listaCompleta('04', '2022');
        $data = [];

        foreach ($m as $row) {
            $aux['parceiro'] = $row['parceiro'];
            $aux['descricao'] = $row['descricao'];
            $aux['valor'] = $row['valor'];
            $aux['status'] = $this->statusHandler($row).
                             $this->editHandler($row);
            $data[] = $aux;
        }

        $label = ['Parceiro', 'Descrição', 'Valor', 'Status'];
        $table = new Table($data, $label);
        return $table->getHTML();
    }

    private function statusHandler($row) {
        $color = $row['liquidada'] ? 'green' : 'red';
        $html  = '<a><i id="'.$row['id'];
        $html .= '"class="fas fa-check-circle mr-3 ';
        $html .= $color.'-text pay_btn"></i></a>';
        return $html;
    }

    private function editHandler($row) {
        $html  = '<a><i id="'.$row['id'];
        $html .= '"class="fas fa-edit mr-3 ';
        $html .= 'indigo-text edit_btn"></i></a>';
        return $html;
    }

    public function cria($tipo) {
        if(sizeof($_POST) == 0) return;

        list($ano, $mes) = explode('-', $_POST['month']);
        $_POST['ano'] = $ano;
        $_POST['mes'] = $mes;

        $data = $this->input->post();
        $this->validate();

        if($this->form_validation->run()){
            if($data['id']) {
                $this->bill->edita($data);
            } else {
                $this->bill->cria($data);
            }            
        }
    }

    private function validate() {
        $this->form_validation->set_rules('parceiro', 'Parceiro comercial', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('descricao', 'Descrição da conta', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('valor', 'Preço a ser pago', 'required|greater_than[0]');  
        $this->form_validation->set_rules('mes', 'Mês de pagamento', 'required|greater_than[0]|less_than[13]');      
        $this->form_validation->set_rules('ano', 'Ano de pagamento', 'required|greater_than[2019]|less_than[2031]');
    }

    public function lista($tipo, $mes, $ano) {
        $v = $this->bill->lista($tipo, $mes, $ano);
        $data = [];

        foreach ($v as $row) {
            $aux['parceiro'] = $row['parceiro'];
            $aux['descricao'] = $row['descricao'];
            $aux['valor'] = $row['valor'];
            $aux['btn'] = $this->getActionButton($row);
            $data[] = $aux;
        }

        $label = ['Parceiro', 'Descrição', 'Valor', ''];
        $table = new Table($data, $label);
        return $table->getHTML();
    }

    private function getActionButton($row) {
        $cor = $row['liquidada'] % 2 ? 'green-text' : 'text-muted';
        $html = '<a><i id="'.$row['id'].'"class="fas fa-check-circle mr-3 '.$cor.' pay_btn"></i></a>';
        $html .= '<a><i id="'.$row['id'].'"class="far fa-edit mr-3 green-text edit_btn"></i></a>';
        $html .= '<a><i id="'.$row['id'].'" class="fas fa-times red-text delete_btn"></i></a>';
        return $html;
    }

    public function delete_conta() {
        $data = $this->input->post();
        $this->bill->delete($data);
    }

    public function status_conta() {
        $data = $this->input->post();
        $this->bill->status($data);
    }

    public function get_conta(){
        $data = $this->input->post();
        print_r($this->bill->getConta($data));
    }
}