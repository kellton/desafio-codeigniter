<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if (usuario_sessao_adm()) {
		// 	redirect('gerenciador');
		// }
		$this->load->model('UsuarioModel');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function validacao()
	{
		$this->form_validation->set_rules('login', 'Login', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'callback__checar_usuario|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			redirect(base_url('home'));
		}
	}

	function _checar_usuario($senha)
	{
		$email = $this->input->post('login');
		$resultado = $this->UsuarioModel->buscaUsuario($email, md5($senha));
		if ($resultado) {
			$array_usuario = array(
				'id' => $resultado->id,
				'nome' => $resultado->nome,
				'email' => $resultado->email,
				'tipo_usuario' => $resultado->id_tipo_usuario
			);
			$this->session->set_userdata('usuario', $array_usuario);
			return TRUE;
		} else {
			$this->form_validation->set_message('_checar_usuario', 'E-mail e/ou Senha Inválidos');
			return FALSE;
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
