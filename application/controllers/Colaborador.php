<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Colaborador extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!usuario_master()) {
            redirect(base_url());
        }
        $this->load->model('ColaboradorModel');
        $this->load->model('UsuarioModel');
    }

    public function index()
    {
        $dados['colaboradores'] = $this->ColaboradorModel->listarColaboradores();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('colaborador/listar', $dados);
        $this->load->view('footer');
    }

    public function formCadastrar()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('colaborador/cadastrar');
        $this->load->view('footer');
    }

    public function cadastrar()
    {
        $dados = elements(array('nome', 'email', 'telefone', 'setor', 'cpf', 'fornecedor', 'acesso_portal'), $this->input->post());
        $this->form_validation->set_rules('nome', 'Nome do Colaborador', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[tb_colaborador.email]');
        $this->form_validation->set_message('is_unique', 'O %s Já Esta cadastrado no Sistema');
        $this->form_validation->set_rules('telefone', 'Telefone do Colaborador', 'required');
        $this->form_validation->set_rules('setor', 'Setor do Colaborador', 'required');
        $this->form_validation->set_rules('cpf', 'CPF do Colaborador', 'required|is_unique[tb_colaborador.cpf]');
        if ($dados['acesso_portal'] == "Sim") {
            $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[7]');
            $this->form_validation->set_rules('r_senha', 'Repetir Senha', 'required|matches[senha]');
            $this->form_validation->set_rules('login', 'Login', 'required|is_unique[tb_usuario.login]');
            if ($this->form_validation->run() == FALSE) {
                $this->formCadastrar();
            } else {
                $usuario['login'] = $this->input->post('login');
                $usuario['nome'] = $dados['nome'];
                $usuario['email'] = $dados['email'];
                $usuario['senha'] = md5($this->input->post('senha'));
                $usuario['tipo_usuario'] = "Colaborador";
                $this->session->set_flashdata('mensagem', 'Colaborador Adcionado Com Sucesso!!!');
                $this->UsuarioModel->adicionarUsuario($usuario);
                $this->ColaboradorModel->adicionarColaborador($dados);
                redirect(base_url('listar-colaborador'));
            }
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->formCadastrar();
            } else {
                $this->ColaboradorModel->adicionarColaborador($dados);
                $this->session->set_flashdata('mensagem', 'Colaborador Adcionado Com Sucesso!!!');
                redirect(base_url('listar-colaborador'));
            }
        }
    }

    public function formEditar($id)
    {
        $dados['colaborador'] = $this->ColaboradorModel->getColaborador($id);
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('colaborador/editar', $dados);
        $this->load->view('footer');
    }

    public function editar($id)
    {
        $colaborador = $this->ColaboradorModel->getColaborador($id);
        $dados = elements(array('nome', 'email', 'telefone', 'setor', 'cpf', 'fornecedor', 'acesso_portal'), $this->input->post());
        if ($colaborador['status'] == "Inativo") {
            $this->session->set_flashdata('mensagem', 'Colaborar Inativo. Não é Possível Fazer Edição');
            redirect(base_url("formulario-editar-colaborador/$id"));
        }
        $this->form_validation->set_rules('nome', 'Nome do Colaborador', 'required');
        if ($dados['email'] == $colaborador['email']) {
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[tb_colaborador.email]');
        }
        if ($dados['cpf'] == $colaborador['cpf']) {
            $this->form_validation->set_rules('cpf', 'CPF do Colaborador', 'required');
        } else {
            $this->form_validation->set_rules('cpf', 'CPF do Colaborador', 'required|is_unique[tb_colaborador.cpf]');
        }
        $this->form_validation->set_message('is_unique', 'O %s Já Esta cadastrado no Sistema');
        $this->form_validation->set_rules('telefone', 'Telefone do Colaborador', 'required');
        $this->form_validation->set_rules('setor', 'Setor do Colaborador', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->formEditar($id);
        } else {
            $this->ColaboradorModel->editarColaborador($id, $dados);
            $this->session->set_flashdata('mensagem', 'Colaborador Editado Com Sucesso!!!');
            redirect(base_url('listar-colaborador'));
        }
    }

    public function ativar($id)
    {
        $dados = $this->ColaboradorModel->getColaborador($id);
        $this->ColaboradorModel->editarColaborador($id, array('status' => 'Ativo'));
        $this->UsuarioModel->editarUsuario($dados['email'], array('status' => 'Ativo'));
        $this->session->set_flashdata('mensagem', 'Colaborador Ativado Com Sucesso!!!');
        redirect(base_url('listar-colaborador'));
    }

    public function inativar($id)
    {
        $dados = $this->ColaboradorModel->getColaborador($id);
        $this->ColaboradorModel->editarColaborador($id, array('status' => 'Inativo'));
        $this->UsuarioModel->editarUsuario($dados['email'], array('status' => 'Inativo'));
        $this->session->set_flashdata('mensagem', 'Colaborador Inativado Com Sucesso!!!');
        redirect(base_url('listar-colaborador'));
    }
}
