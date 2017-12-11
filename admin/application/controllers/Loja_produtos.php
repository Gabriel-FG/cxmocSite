<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loja_produtos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loja/produtos_model');
        $this->load->helper('form');
        $this->load->helper('text');

        $this->set_menu_active(
                            array(
                                'menu' => 'Loja',
                                'submenu' => 'Loja-produtos'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['produtos'] =  $this->produtos_model->get_produtos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }


        $this->montaTela('Loja/lista', $data);
    }

    function novo_produto(){
        $data['categorias'] = $this->produtos_model->get_categorias();
      
        $this->montaTela('loja/formulario', $data);
    }

    function salvar_produto(){
        // echo '<pre>';
        // var_dump($_FILES, $_POST);
        // exit;
        if($this->input->post()){
            $dados = array(
                'titulo' => $this->input->post('nome'),
                'categorias_id' => $this->input->post('categoria'),
                'valor' => $this->input->post('valor'),
                'valor_antigo' => $this->input->post('valor_antigo'),
                'descricao' => $this->input->post('descricao'),
                'estoque' => $this->input->post('estoque'),
                'comprimento_embalagem' => $this->input->post('comprimento_embalagem'),
                'altura_embalagem' => $this->input->post('altura_embalagem'),
                'largura_embalagem' => $this->input->post('largura_embalagem'),
                'peso' => $this->input->post('peso'),
                
            );
           
            $id=NULL;
            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }



            if($id_produto = $this->produtos_model->salvar_produto($dados, $id))
            {
               
                
                $db_img_produtos = array();
                $files = $_FILES;
                $cont = count($_FILES['imagem']['name']);
                for ($i=0; $i < $cont; $i++) {
                    $this->load->library('upload', array(
                            'upload_path' => FCPATH.'../assets/images/produtos',
                            'allowed_types' => 'jpg|png|gif',
                            'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                            'max_size' => 8 * 1024,
                            'remove_spaces' => TRUE
                        ));

                    $_FILES['imagem']['name']= $files['imagem']['name'][$i];
                    $_FILES['imagem']['type']= $files['imagem']['type'][$i];
                    $_FILES['imagem']['tmp_name']= $files['imagem']['tmp_name'][$i];
                    $_FILES['imagem']['error']= $files['imagem']['error'][$i];
                    $_FILES['imagem']['size']= $files['imagem']['size'][$i];

                    if ($this->upload->do_upload('imagem')){
                        $file_data = $this->upload->data();
                        $this->load->library('image_lib', array(
                                'image_library' => 'gd2',
                                'source_image' => $file_data['full_path'],
                                'create_thumb' => FALSE,
                                'maintain_ratio' => TRUE,
                                'width' => 400,
                                'height' => 400
                            )
                        );
                        $this->image_lib->resize();
                        array_push($db_img_produtos, array('foto' => $file_data['file_name'], 'produtos_id' => $id_produto));
                    }

                } 

                //´só é usado durante a edição, serve para apagar a imagem do servidor
                if($this->input->post('remove_imagem')){
                    if ($this->produtos_model->excluir_imagem($this->input->post('remove_imagem'))) {
                        foreach ($this->input->post('nome_imagem') as $imagem) {
                            $apagar = FCPATH.'../assets/images/produtos/' . $imagem;
                            @unlink($apagar);
                        }
                    }
                }

                //verifica se foi feito o upload de alguma imagem (mais usado durante a edição de produtos)
                if(count($db_img_produtos) > 0){
                    if($this->produtos_model->salvar_galeria($db_img_produtos)){
                        $_GET['type'] = 'success';
                        if($id){
                            $_GET['title'] = 'Atualização';
                            $_GET['message'] = 'Produto e galeria de imagem atualizados com sucesso!';
                        }else{
                            $_GET['title'] = 'Cadastro';
                            $_GET['message'] = 'Produto e galeria de imagem cadastrados com sucesso!';
                        }
                    }else{
                        $_GET['type'] = 'error';
                        if($id){
                            $_GET['title'] = 'Atualização';
                            $_GET['message'] = 'Ocorreu um erro ao atualizar a galeria de imagem do produto!';
                        }else{
                            $_GET['title'] = 'Cadastro';
                            $_GET['message'] = 'Ocorreu um erro ao cadastrar a galeria de imagem do produto!';
                        }
                    }
                }else{
                    $_GET['type'] = 'success';
                    if($id){
                        $_GET['title'] = 'Atualização';
                        $_GET['message'] = 'Produto atualizado com sucesso!';
                    }else{
                        $_GET['title'] = 'Cadastro';
                        $_GET['message'] = 'Produto cadastrado com sucesso!';
                    }
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o produto!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o produto!';
                }
            }
            $this->lista();
            $url = base_url(array('loja'));
            $this->output->append_output('<script>window.history.replaceState("", "meritus", "'. $url .'")</script>');
        }
    }

    public function editar_produto()
    {
        if($this->input->get('id')){
            $dados['categorias'] = $this->produtos_model->get_categorias();
            $dados['produto'] = $this->produtos_model->get_produto($this->input->get('id'));
            $this->montaTela('loja/formulario', $dados);
        }
    }

    function excluir_produto(){



        if($this->produtos_model->excluir_produto($this->input->post('id'))){
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Produto excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o produto!';
                        echo json_encode($response);
                    }
                    exit;
        if ($this->input->post('id')) {

            if($galeria = $this->produtos_model->get_galeria_produto($this->input->post('id'))){
                if($this->produtos_model->excluir_galeria($this->input->post('id'))){
                    if($this->produtos_model->excluir_produto($this->input->post('id'))){
                        foreach ($galeria as $img) {
                            $apagar = FCPATH.'../assets/images/produtos/' . $img->imagem;
                            @unlink($apagar);
                        }
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Produto excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o produto!';
                        echo json_encode($response);
                    }
                }
            }else{
                if($this->produtos_model->excluir_produto($this->input->post('id'))){
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Produto excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o produto!';
                        echo json_encode($response);
                    }
            }
        }
        return;
    }


    public function desativar_produto(){

        if($this->input->get('id')){

            if($this->produtos_model->desativar_produto($this->input->get('id'))){
                    $_GET['type'] = 'success';
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Produto atualizado com sucesso!';
                    $this->lista();
                    $url = base_url(array('loja', 'produtos'));
                    $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');

            }else{

                    $_GET['type'] = 'error';
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'erro ao atualizar o produto!';
                    $this->lista();
                    $url = base_url(array('loja', 'produtos'));
                    $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
            }

        }
       

    }

}