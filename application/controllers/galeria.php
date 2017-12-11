<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('imagens_model');
	}

	public function pegar_imagens(){
		$this->load->model('imagens_model');
		
	}
}


