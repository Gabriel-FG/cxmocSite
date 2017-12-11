<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//->login
$route['login']                                     = "Admin/login";
$route['validar-login']                             = "Admin/validar_login";
$route['logout']                                    = "Admin/logout";




//-->L1-C1
$route['home/l1-c1']                                = "home/Home_l1_c1";
$route['home/salvar-l1-c1']                         = "home/Home_l1_c1/salvar_l1_c1";

//-->L1-C2
$route['home/l1-c2']                                = "home/Home_l1_c2";
$route['home/salvar-l1-c2']                         = "home/Home_l1_c2/salvar_l1_c2";

//-->L1-C3
$route['home/l1-c3']                                = "home/Home_l1_c3";
$route['home/salvar-l1-c3']                         = "home/Home_l1_c3/salvar_l1_c3";

//-->L3-C1
$route['home/l3-c1']                                = "home/Home_l3_c1";
$route['home/salvar-l3-c1']                         = "home/Home_l3_c1/salvar_l3_c1";

//-->L3-C2
$route['home/l3-c2']                                = "home/Home_l3_c2";
$route['home/salvar-l3-c2']                         = "home/Home_l3_c2/salvar_l3_c2";

//-->L3-C3
$route['home/l3-c3']                                = "home/Home_l3_c3";
$route['home/salvar-l3-c3']                         = "home/Home_l3_c3/salvar_l3_c3";

//->menu site
$route['site']                                      = "Site_institucional";
$route['home']                                      = "Site_noticias/lista";

//-->banner
$route['site/banners']                              = "Site_banners/lista";
$route['site/novo-banner']                          = "Site_banners/novo_banner";
$route['site/salvar-banner']                        = "Site_banners/salvar_banner";
$route['site/editar-banner']                        = "Site_banners/editar_banner";
$route['site/excluir-banner']                       = "Site_banners/excluir_banner";

//-->sobre
$route['site/sobre']                                = "Site_sobre";
$route['site/salvar-sobre']                         = "Site_sobre/salvar_sobre";

//-->institucional
$route['site/institucional']                       = "Site_institucional";
$route['site/editar-institucional']                 = "Site_institucional/editar_institucional";
$route['site/editar-certificacao']                 = "Site_institucional/editar_certificacao";
$route['site/editar-servicos']                     = "Site_institucional/editar_servicos";
$route['site/editar-termos']                     = "Site_institucional/editar_termos";
$route['site/editar-termos-de-uso']                     = "Site_institucional/editar_termos_de_uso";
$route['site/editar-termos-uso']                     = "Site_institucional/editar_termo_uso";


$route['site/certificacao']                        = "Site_institucional/certificacao";
$route['site/servicos-publicos']                   = "Site_institucional/servicos_publicos";


$route['site/ead']                   			   = "Site_institucional/ead";
$route['site/editar-ead']                   	   = "Site_institucional/editar_ead";



$route['site/termos-de-uso']                        = "Site_institucional/termos_de_uso";
$route['site/salvar-institucional']                 = "Site_institucional/salvar_institucional";

//-->proposta-pedagogica
$route['site/proposta-pedagogica']                  = "Site_proposta_pedagogica";
$route['site/salvar-proposta-pedagogica']           = "Site_proposta_pedagogica/salvar_proposta_pedagogica";

//-->contrato
$route['site/contrato']                             = "Site_contrato";
$route['site/salvar-contrato']                      = "Site_contrato/salvar_contrato";


//-->anuncios
$route['site/anuncios']                             = "Site_anuncios";
$route['site/salvar-anuncios']                      = "Site_anuncios/salvar_anuncios";

//-->sk-centro
$route['site/solido-centro']                        = "Site_sk_centro";
$route['site/salvar-solido-centro']                 = "Site_sk_centro/salvar_sk_centro";

//-->sk-parque
$route['site/solido-parque']                        = "Site_sk_parque";
$route['site/salvar-solido-parque']                 = "Site_sk_parque/salvar_sk_parque";

//-->matriculas
$route['site/matricula']                            = "Site_matriculas";
$route['site/salvar-matricula']                     = "Site_matriculas/salvar_matricula";

//-->noticias
$route['site/noticias']                              = "Site_noticias/lista";
$route['site/nova-noticia']                          = "Site_noticias/nova_noticia";
$route['site/salvar-noticia']                        = "Site_noticias/salvar_noticia";
$route['site/editar-noticia']                        = "Site_noticias/editar_noticia";
$route['site/excluir-noticia']                       = "site_noticias/excluir_noticia";

//-->eventos
$route['site/eventos']                              = "Site_eventos/lista";
$route['site/novo-evento']                          = "Site_eventos/novo_evento";
$route['site/salvar-evento']                        = "Site_eventos/salvar_evento";
$route['site/editar-evento']                        = "Site_eventos/editar_evento";
$route['site/excluir-evento']                       = "Site_eventos/excluir_evento";

//-->galerias
$route['site/galeria']                              = "galeria/galeria";
$route['site/nova-galeria']                         = "galeria/nova_imagem";
$route['site/add-fotos']                            = "galeria/salvar_img";
$route['site/salvar-galeria']                       = "Site_galerias_fotos/salvar_galeria";
$route['site/salvar-fotos']                         = "Site_galerias_fotos/salvar_fotos";
$route['site/editar-galeria']                       = "Site_galerias_fotos/editar_galeria";
$route['site/excluir-galeria']                      = "galeria/excluir_img";


//-->videos
$route['site/videos']                               = "Site_videos/lista";
$route['site/novo-video']                           = "Site_videos/novo_video";
$route['site/salvar-video']                         = "Site_videos/salvar_video";
$route['site/editar-video']                         = "Site_videos/editar_video";
$route['site/excluir-video']                        = "Site_videos/excluir_video";

//-->news letter
$route['site/news-letter']                          = "Site_news_letter";

//->menu loja
$route['loja']                                      = "Loja_categorias";

//-->categorias
$route['loja/categorias']                           = "Loja_categorias/lista";
$route['loja/nova-categoria']                       = "Loja_categorias/novo_categoria";
$route['loja/salvar-categoria']                     = "Loja_categorias/salvar_categoria";
$route['loja/editar-categoria']                     = "Loja_categorias/editar_categoria";
$route['loja/excluir-categoria']                    = "Loja_categorias/excluir_categoria";

//-->produtos
$route['loja/produtos']                             = "Loja_produtos/lista";
$route['loja/novo-produto']                         = "Loja_produtos/novo_produto";
$route['loja/salvar-produto']                       = "Loja_produtos/salvar_produto";
$route['loja/editar-produto']                       = "Loja_produtos/editar_produto";
$route['loja/excluir-produto']                      = "Loja_produtos/excluir_produto";
$route['loja/desativar-produto']                      = "Loja_produtos/desativar_produto";


//-->clientes
$route['loja/clientes']                             = "Loja_clientes/lista";
$route['loja/enderecos']                            = "Loja_clientes/lista_enderecos";

//-->pedidos
$route['loja/pedidos']                               = "Loja_pedidos/lista";
$route['loja/detalhes-pedido']                       = "Loja_pedidos/detalhes_pedido";
$route['loja/imprimir']                              = "Loja_pedidos/detalhes_pedido";
$route['loja/editar-pedido']                         = "Loja_pedidos/editar_pedido";
$route['loja/salvar-pedido']                         = "Loja_pedidos/salvar_pedido";
$route['loja/salvar-rastreio']                       = "Loja_pedidos/salvar_rastreio";


//-->projetos de lei
$route['site/projetos']                                   = "Site_projetos_lei/lista";
$route['site/novo-projeto']                               = "Site_projetos_lei/novo_projeto";
$route['site/salvar-projeto-lei']                         = "Site_projetos_lei/salvar_projeto";
$route['site/editar-projeto']                         	  = "Site_projetos_lei/editar_projeto";
$route['site/excluir-projeto']                         	  = "Site_projetos_lei/excluir_projeto";



//-->Enquetes
$route['site/enquetes']                           	= "enquetes/Enquetes/lista";
$route['site/nova-enquete']                      	= "enquetes/Enquetes/nova_enquete";
$route['site/editar-enquete']                      	= "enquetes/Enquetes/editar_enquete";
$route['site/salvar-enquete']                       = "enquetes/Enquetes/salvar_nova_enquete";
$route['site/mudar-status-enquete-ativar']          = "enquetes/Enquetes/mudar_status_ativar";
$route['site/detalhes-enquete']       			    = "enquetes/Enquetes/detalhes_enquete";
$route['site/mudar-status-enquete-desativar']       = "enquetes/Enquetes/mudar_status_desativar";


//-->Denuncias
$route['site/denuncias']                           	= "denuncias/denuncias/lista";
$route['site/lista-denuncias']                       = "denuncias/denuncias/lista_denuncias";
$route['site/novo-tipo-denuncia']                   = "denuncias/denuncias/tela_novo_tipo";
$route['site/salvar-novo-tipo']                   = "denuncias/denuncias/salvar_novo_tipo";
$route['site/editar-tipo-denuncia']                 = "denuncias/denuncias/tela_editar_tipo";


//-->eleicao final
$route['site/eleicao-final']                          = "eleicaoFinal/EleicaoFinal/lista";
$route['site/nova-eleicao']                           = "eleicaoFinal/EleicaoFinal/nova_eleicao";
$route['site/pegar-estados']                          = "eleicaoFinal/EleicaoFinal/pegar_estados";
$route['site/pegar-cidades']                          = "eleicaoFinal/EleicaoFinal/pegar_cidades";
$route['site/salvar-eleicao']                         = "eleicaoFinal/EleicaoFinal/salvar_eleicao";
$route['site/editar-eleicao']                         = "eleicaoFinal/EleicaoFinal/editar_eleicao";
$route['site/excluir-eleicao']                        = "eleicaoFinal/EleicaoFinal/excluir_eleicao";


//-> Candidatos Oficiais

$route['site/candidatos-oficiais']                    = "candidatosOficiais/Site_candidatos_oficiais/lista";
$route['site/novo-candidato-oficial']                 = "candidatosOficiais/Site_candidatos_oficiais/novo_candidato";
$route['site/salvar-candidato-oficial']               = "candidatosOficiais/Site_candidatos_oficiais/salvar_candidato";
$route['site/editar-candidato-oficial']               = "candidatosOficiais/Site_candidatos_oficiais/editar_candidato";
$route['site/excluir-candidato-oficial']              = "candidatosOficiais/Site_candidatos_oficiais/excluir_candidato_oficial";


//processos
$route['site/processos']							= "processos/lista";
$route['site/novo-processo']						= "processos/novo_processo";
$route['site/salvar-processo']						= "processos/salvar_processo";
$route['site/detalhes-processo']					= "processos/detalhes_processo";
$route['site/editar-processo']						= "processos/editar_processo";
$route['site/excluir-processo']						= "processos/excluir_processo";



$route['site/filtro-palavrao']              		 = "filtro_palavrao/Filtro_palavrao/lista";
$route['site/filtro-palavrao-nova']             	 = "filtro_palavrao/Filtro_palavrao/nova_palavra";
$route['site/filtro-palavrao-salvar-palavra']        = "filtro_palavrao/Filtro_palavrao/salvar_palavra";
$route['site/filtro-palavrao-editar-palavra']        = "filtro_palavrao/Filtro_palavrao/editar_palavra";
$route['site/filtro-palavrao-excluir-palavra']       = "filtro_palavrao/Filtro_palavrao/excluir_palavra";



$route['site/utilidade']                   	   = "Site_institucional/utilidade_publica";

$route['site/salvar-utilidade']                   	   = "Site_institucional/salvar_utilidade";
$route['site/nova-utilidade']                   	   = "Site_institucional/nova_utilidade";
$route['site/editar-utilidade']                   	   = "Site_institucional/editar_utilidade";
$route['site/excluir-utilidade']                   	   = "Site_institucional/excluir_utilidade";


