<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_noticias extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/noticias_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-noticias'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['noticias'] =  $this->noticias_model->get_noticias();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/noticias/lista', $data);
    }

    function nova_noticia(){
        $this->montaTela('site/noticias/formulario');
    }

    function salvar_noticia(){
        $this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['noticia']['name'])){

                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/imgs_xadrez',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));
              
                if ($this->upload->do_upload('noticia')){
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

                if($this->input->post('imagem_noticia')){
                    if ($_FILES['noticia']['name'] != $this->input->post('imagem_noticia')) {
                        $apagar = FCPATH.'../assets/images/imgs_xadrez/' . $this->input->post('imagem_noticia');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_noticia')){
                    $file_data['file_name'] = $this->input->post('imagem_noticia');
                }else{
                    $file_data['file_name'] = '';
                }
            }

           



            //caso nome_url n seja unico
            $slug_url =  url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE);
            $test_url = $this->noticias_model->confere_nome_url($slug_url);

            if($test_url){
                //ja existe essa slug
               $nome_url_gerado = $this->gerar_novo_nome_url($slug_url);//gerar uma nova

                   $dados = array(
                    'titulo' => $this->input->post('titulo'),
                    //'nome_url' => url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE),
                    'nome_url' => $nome_url_gerado,
                    'conteudo' => $this->input->post('conteudo'),
                    'descricao' => $this->input->post('descricao'),
                    'imagem' => $file_data['file_name'],
                    'data'   => time()
                );
            }else{

                  $dados = array(
                    'titulo' => $this->input->post('titulo'),
                    'nome_url' => url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE),
                    'conteudo' => $this->input->post('conteudo'),
                    'descricao' => $this->input->post('descricao'),
                    'imagem' => $file_data['file_name'],
                    'data'   => time()
                );


            }
       


            $id = NULL;

            //editar noticia
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }else{
                $dados['data'] = time();
            }

            if($this->noticias_model->salvar_noticia($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Notícia atualizada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Notícia cadastrada com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a notícia!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a notícia!';
                }
            }
            $this->lista();
            $url = base_url(array('site'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');
        }
    }

    public function editar_noticia()
    {
        if($this->input->get('id')){
            $dados['noticia'] = $this->noticias_model->get_noticia($this->input->get('id'));
            $this->montaTela('site/noticias/formulario', $dados);
        }
    }

    function excluir_noticia(){
            $id = $this->input->post('id');        
            if($this->noticias_model->excluir_noticia($id)){
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Notícia excluída com sucesso!';
                echo json_encode($response);

            }
    }




    function gerar_novo_nome_url($slug_url){        

        $contador = 1000000;
        for ($i=1; $i <$contador; $i++) {

           $novo_slug_url = $slug_url ."-" . $i;
           $test_url =  $this->noticias_model->confere_nome_url($novo_slug_url);

           if($test_url == false){
            break;

           }

            
        }
       /* echo '<pre>';
        print_r($novo_slug_url);
        echo '</pre>';
        exit();*/

        return $novo_slug_url;

    }


}