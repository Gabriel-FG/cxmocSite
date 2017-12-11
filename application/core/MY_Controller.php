<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    //recebe a url da pagina para ser adicionada no conteudo
    public function montaTela($paginaConteudo, $data = NULL)
    {
        // $data['active_menu'] = $this->active_menu;
        $this->load->view('header', $data);
        $this->load->view($paginaConteudo);
        $this->load->view('footer');
    }

    
}
