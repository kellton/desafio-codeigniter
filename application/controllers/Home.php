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
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!usuario_master()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('home');
        $this->load->view('footer');
    }
}
