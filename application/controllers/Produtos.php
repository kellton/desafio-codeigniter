<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!usuario_master()) {
            redirect(base_url());
        }
        $this->load->model('ProdutosModel');
    }

    public function index()
    {
        $dados['produtos'] = $this->ProdutosModel->listarProdutos();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('produtos/listar', $dados);
        $this->load->view('footer');
    }

    public function formCadastrar()
    {
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('produtos/cadastrar');
        $this->load->view('footer');
    }

    public function cadastrar()
    {
        $dados = elements(array('nome', 'quantidade', 'descricao', 'preco'), $this->input->post());
        $this->form_validation->set_rules('nome', 'Nome do Colaborador', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidae', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('preco', 'Preço', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->formCadastrar();
        } else {
            $this->ProdutosModel->adicionarProduto($dados);
            $this->session->set_flashdata('mensagem', 'Produto Adicionado Com Sucesso!!!');
            redirect(base_url('listar-produto'));
        }
    }

    public function formEditar($id)
    {
        $dados['produto'] = $this->ProdutosModel->getProduto($id);
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('produtos/editar', $dados);
        $this->load->view('footer');
    }

    public function editar($id)
    {
        $produto = $this->ProdutosModel->getProduto($id);
        if ($produto['status'] == "Inativo") {
            $this->session->set_flashdata('mensagem', 'Produto Inativo. Não é Possível Fazer Edição');
            redirect(base_url("formulario-editar-produto/$id"));
        }
        $dados = elements(array('nome', 'quantidade', 'descricao', 'preco'), $this->input->post());
        $this->form_validation->set_rules('nome', 'Nome do Colaborador', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidae', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('preco', 'Preço', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->formCadastrar();
        } else {
            $this->ProdutosModel->editarProduto($id, $dados);
            $this->session->set_flashdata('mensagem', 'Produto Editado Com Sucesso!!!');
            redirect(base_url('listar-produto'));
        }
    }

    public function ativar($id)
    {
        $this->ProdutosModel->editarProduto($id, array('status' => 'Ativo'));
        $this->session->set_flashdata('mensagem', 'Produto Ativado Com Sucesso!!!');
        redirect(base_url('listar-produto'));
    }

    public function inativar($id)
    {
        $this->ProdutosModel->editarProduto($id, array('status' => 'Inativo'));
        $this->session->set_flashdata('mensagem', 'Produto Inativado Com Sucesso!!!');
        redirect(base_url('listar-produto'));
    }
}
