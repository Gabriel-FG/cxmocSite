<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_candidatos_oficiais extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('candidatosOficiais/Candidatos_oficiais_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-candidatos-oficiais'
                                )
                            );
    }

    public function lista()
    {
        $dados['candidatos'] = $this->Candidatos_oficiais_model->get_candidatos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $dados['notification'] = $notification;
        }


           /*echo '<pre>';
            print_r($dados);
            echo '</pre>';
            exit();*/
        $this->montaTela('site/candidatosOficiais/lista',$dados);
    }

    public function novo_candidato(){
        $dados['eleicoes_candidato_pertence'] = $this->Candidatos_oficiais_model->get_eleicoes();
        $dados['partidos'] = $this->Candidatos_oficiais_model->get_partidos();
        $dados['politicos_perfis'] = $this->Candidatos_oficiais_model->get_perfis_politico();

            /*echo '<pre>';
            print_r($dados);
            echo '</pre>';
            exit();
            */
    
        $this->montaTela('site/candidatosOficiais/formulario',$dados);

    }

    public function editar_candidato()
    {
        if($this->input->get('id')){
            $dados['candidato'] = $this->Candidatos_oficiais_model->get_candidato($this->input->get('id'));
            $dados['eleicoes_candidato_pertence'] = $this->Candidatos_oficiais_model->get_eleicoes();
            $dados['partidos'] = $this->Candidatos_oficiais_model->get_partidos();
            $dados['politicos_perfis'] = $this->Candidatos_oficiais_model->get_perfis_politico();
            /*echo '<pre>';
            print_r($dados);
            echo '</pre>';
            exit();*/
            $this->montaTela('site/candidatosOficiais/formulario', $dados);
        }
    }



    public function salvar_candidato(){
        //$this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['foto_candidato']['name'])){
               $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/candidatoFotos',
                        'allowed_types' => 'jpg|png|gif|jpeg',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));


                if ($this->upload->do_upload('foto_candidato')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                            'image_library' => 'gd2',
                            'source_image' => $file_data['full_path'],
                            'create_thumb' => FALSE,
                            'maintain_ratio' => TRUE,
                            'width' => 1680,
                            'height' => 1100
                        )
                    );
                    $this->image_lib->resize();
                } 

                //caso alterar imagem de um projeto, apagar a anterior da pasta.
                if($this->input->post('imagem_candidato')){
                    if ($_FILES['foto_candidato']['name'] != $this->input->post('imagem_candidato')) {
                        $apagar = FCPATH.'../assets/images/candidatoFotos/' . $this->input->post('imagem_candidato');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_candidato')){
                    $file_data['file_name'] = $this->input->post('imagem_candidato');
                }else{
                    $file_data['file_name'] = '';
                }
            }
            

           $dados = array(
                'nome' => $this->input->post('nome'),
                'partidos_id' => $this->input->post('partido'),
                'perfis_id' => $this->input->post('perfil'),
                'eleicao_id' => $this->input->post('eleicao'),
                'foto' => $file_data['file_name']

            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->Candidatos_oficiais_model->salvar_candidato($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Eleição atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Eleição cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a eleição!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a eleição!';
                }
            }
            $this->lista();
            $url = base_url(array('site', 'candidatos-oficiais'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
        }
    }



    public function excluir_candidato_oficial(){       

        if ($this->input->post('id')) {
            $candidato = $this->Candidatos_oficiais_model->get_candidato($this->input->post('id'));

            //excluir votos candidato
            if($this->Candidatos_oficiais_model->excluir_votos_candidato($candidato)){   
            //excluir candidato
            if($this->Candidatos_oficiais_model->excluir_candidato_oficial($this->input->post('id'))){
                $apagar = FCPATH.'../assets/images/candidatoFotos/' . $candidato->foto;
                @unlink($apagar);
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Candidato excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o candidato!';
                echo json_encode($response);
            }
        }else{
            $response['type'] = 'error';
            $response['title'] = 'Exclusão';
            $response['message'] = 'Ocorreu um erro ao excluír os votos do candidato!';
            echo json_encode($response);

        }


        }
        return;
    }


    



}


/* echo '<pre>';
print_r($candidato);
echo '</pre>';
exit();*/