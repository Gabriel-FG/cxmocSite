<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galeria extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/galeria_model');
        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-galeria'
                                )
                            );
       }

        public function galeria(){


       
       	$dados['imagens'] = $this->galeria_model->galeria();
       	$this->montaTela('site/galeria/galeria_lista', $dados);


      
       }

       public function nova_imagem(){

       		$this->montaTela('site/galeria/galeria');
       }

       public function salvar_img(){
       		    if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/cxmoc_imgs',
                        'allowed_types' => 'jpg|png|gif|PNG',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if($this->upload->do_upload('imagem')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                            'image_library' => 'gd2',
                            'source_image' => $file_data['full_path'],
                            'create_thumb' => FALSE,
                            'maintain_ratio' => TRUE,
                            'width' => 800,
                            'height' => 400
                        )
                    );
                    $this->image_lib->resize();
                }

            }
            $imagem['imagem'] = $file_data['file_name'];
            $this->galeria_model->salvar_img_db($imagem);
            $dados['imagens'] = $this->galeria_model->galeria();
       		$this->montaTela('site/galeria/galeria_lista', $dados);
       }
		
	 	public function excluir_img(){
	 		$id = $this->input->post('id');		
			if($this->galeria_model->excluir_img($id)){
				
				$response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Imagem excluída com sucesso!';
                echo json_encode($response);
	 	}    
	}
}