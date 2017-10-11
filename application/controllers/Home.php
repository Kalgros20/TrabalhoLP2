<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function Colaborador(){
        $this->load->view('static/cabecalho');
        $this->load->view('static/header');

        $colaborador = $this->session->userdata();
        $data = $this->load->model('Home/HomeModel','model');
        $data['lista'] = $this->model->

        $this->load->view('static/footer');
        $this->load->view('static/scripts');
    }
    public function Presidente(){
        
    }
    public function Gerente(){

    }
    public function Supervisor(){

    }
}

?>