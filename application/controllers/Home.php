<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function Colaborador(){

    }
    public function Presidente(){
        $this->load->view('static/cabecalho');
        $this->load->view('static/header');

        $presidente = $this->session->userdata();

        $this->load->model('Home/HomeModel','model');
        $data['lista'] = $this->model->getListaFunc($presidente);
        $this->load->view('listas/lista', $data);

        $this->load->view('static/footer');
        $this->load->view('static/scripts');
    }

    public function Gerente(){

    }
    
    public function Supervisor(){
        $this->load->view('static/cabecalho');
        $this->load->view('static/header');

        $supervisor = $this->session->userdata();

        $this->load->model('Home/HomeModel','model');
        $data['lista'] = $this->model->getListaFunc($supervisor);
        $this->load->view('listas/lista', $data);

        $this->load->view('static/footer');
        $this->load->view('static/scripts');

    }
}

?>