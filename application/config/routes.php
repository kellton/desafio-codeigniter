<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Login';
$route['validacao'] = 'Login/validacao';
$route['logout'] = 'Login/logout';

$route['home'] = 'Home';

/*******ROTAS REFERENTES AO COLABORADOR *******/
$route['listar-colaborador'] = 'Colaborador';
$route['formulario-colaborador'] = 'Colaborador/formCadastrar';
$route['cadastrar-colaborador'] = 'Colaborador/cadastrar';
$route['formulario-editar-colaborador/(:any)'] = 'Colaborador/formEditar/$1';
$route['editar-colaborador/(:any)'] = 'Colaborador/editar/$1';
$route['inativar-colaborador/(:any)'] = 'Colaborador/inativar/$1';
$route['ativar-colaborador/(:any)'] = 'Colaborador/ativar/$1';

/*******ROTAS REFERENTES AO PRODUTO *******/
$route['listar-produto'] = 'Produtos';
$route['formulario-produto'] = 'Produtos/formCadastrar';
$route['cadastrar-produto'] = 'Produtos/cadastrar';
$route['formulario-editar-produto/(:any)'] = 'Produtos/formEditar/$1';
$route['editar-produto/(:any)'] = 'Produtos/editar/$1';
$route['inativar-produto/(:any)'] = 'Produtos/inativar/$1';
$route['ativar-produto/(:any)'] = 'Produtos/ativar/$1';

/*******ROTAS REFERENTES PEDIDOS *******/
$route['listar-pedidos'] = 'Pedidos';
$route['formulario-pedidos'] = 'Pedidos/formCadastrar';
$route['cadastrar-pedido'] = 'Pedidos/cadastrar';
$route['formulario-editar-pedido/(:any)'] = 'Pedidos/formEditar/$1';
$route['editar-pedido/(:any)'] = 'Pedidos/editar/$1';
$route['finalizar-pedido/(:any)'] = 'Pedidos/finalizar/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
