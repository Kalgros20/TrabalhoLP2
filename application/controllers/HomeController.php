<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller{
    public function Colaborador(){

    }
    public function Home(){
        $this->load->view('static/cabecalho');
        $this->load->view('static/header');

        $funcionario = $this->session->userdata();

        $this->load->model('Home/HomeModel','model');
        $data['lista'] = $this->model->getListaFunc($funcionario);
        var_dump($data);
        $this->load->view('listas/lista', $data);

        $this->load->view('static/footer');
        $this->load->view('static/scripts');
    }

}

?>