<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * GERENCIADORCONTROLLER
 * -------------------------------------------------------------------
 * DESCRICAO : 
 * -------------------------------------------------------------------
 * CARREGA : 
 * - N/A
 */
class GerenciadorController extends CI_Controller
{

    /*
     * CONSTRUCT
     * ---------------------------------------
     * DESCRICAO : 
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : N/A
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * INDEX
     * ---------------------------------------
     * DESCRICAO : 
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : N/A
    */
    public function index()
    {
        if (usuario_master()) {
            redirect('adm/home');
        } else {
            if (usuario_sessao_cliente()['cliente'] === "Pessoa Física") {
                redirect('cli');
            } else {
                redirect('cli-juridico');
            }
        }
    }

    /*
     * LOGOUT
     * ---------------------------------------
     * DESCRICAO : 
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : N/A
    */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
