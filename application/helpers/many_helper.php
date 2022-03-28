<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Carbon\Carbon;

/* ********** FUNCOES DE SESSAO ********** */
/*
 * USUARIO_SESSAO_ADM
 * 
 * Retorna todas as informacoes
 * do usuário adm logado.
 *
 * @return  array Array com o objeto de usuario.
*/
function usuario_master() {
    $CI =& get_instance();
    return $CI->session->userdata('usuario');
}

/*
 * USUARIO_SESSAO_CLIENTE
 *
 * Retorna todas as informacoes
 * do usuário cliente logado
 *
 * @return  array Array com o objeto de cliente.
*/
function usuario_sessao_cliente() {
    $CI =& get_instance();
    return $CI->session->userdata('cliente');
}

/*
 * IS_USUARIO_ADM
 *
 * Verifica se o usuario em
 * sessao eh administrador.
 * 
 * @return  boolean True, se o usuario for admin.
*/
function is_usuario_adm(){
    $CI =& get_instance();
    $usuario = $CI->session->userdata('usuario');
    return $usuario && $usuario['tipo_usuario']==1;
}

/*
 * IS_USUARIO_CLI
 *
 * Verifica se o usuario em
 * sessao eh cliente.
 * 
 * @return  boolean True, se o usuario for cliente.
*/
function is_usuario_cli(){
    $CI = & get_instance();
    $usuario = $CI->session->userdata('cliente');
    return $usuario && $usuario['tipo_usuario']!=1;
}