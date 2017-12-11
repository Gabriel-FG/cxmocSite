<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_banners extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/banners_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-banners'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['banners'] =  $this->banners_model->get_banners();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/banners/lista', $data);
    }

    function novo_banner(){
        $this->montaTela('site/banners/formulario');
    }

    function salvar_banner(){
        if($this->input->post()){
            if(!empty($_FILES['banner']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/banners',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('banner')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                            'image_library' => 'gd2',
                            'source_image' => $file_data['full_path'],
                            'create_thumb' => FALSE,
                            'maintain_ratio' => TRUE,
                            'width' => 600,
                            'height' => 350
                        )
                    );
                    $this->image_lib->resize();
                }

                if($this->input->post('imagem_banner')){
                    if ($_FILES['banner']['name'] != $this->input->post('imagem_banner')) {
                        $apagar = FCPATH.'../assets/images/banners/' . $this->input->post('imagem_banner');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_banner')){
                    $file_data['file_name'] = $this->input->post('imagem_banner');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'imagem' => $file_data['file_name']
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->banners_model->salvar_banner($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Banner atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Banner cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o banner!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o banner!';
                }
            }
            $this->lista();
            $url = base_url(array('site'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }

    public function editar_banner()
    {
        if($this->input->get('id')){
            $dados['banner'] = $this->banners_model->get_banner($this->input->get('id'));
            $this->montaTela('site/banners/formulario', $dados);
        }
    }

    function excluir_banner(){
        if ($this->input->post('id')) {
            $banner = $this->banners_model->get_banner($this->input->post('id'));
            if($this->banners_model->excluir_banner($this->input->post('id'))){
                $apagar = FCPATH.'../assets/images/banners/' . $banner->imagem;
                @unlink($apagar);
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Banner excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o banner!';
                echo json_encode($response);
            }
        }
        return;
    }

}