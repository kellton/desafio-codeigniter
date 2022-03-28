<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedidos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!usuario_master()) {
            redirect(base_url());
        }
        $this->load->model('ColaboradorModel');
        $this->load->model('ProdutosModel');
        $this->load->model('PedidosModel');
    }

    public function index()
    {
        $dados['pedidos'] = $this->PedidosModel->listarPedidos();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('pedidos/listar', $dados);
        $this->load->view('footer');
    }

    public function formCadastrar()
    {
        $dados['fornecedores'] = $this->ColaboradorModel->listarFornecedores();
        $dados['produtos'] = $this->ProdutosModel->listarProdutosAtivos();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('pedidos/cadastrar', $dados);
        $this->load->view('footer');
    }

    public function cadastrar()
    {
        $dados = elements(array('produto', 'preco', 'quantidade'), $this->input->post());
        $this->form_validation->set_rules('fornecedor', 'Nome do Colaborador', 'required');
        $this->form_validation->set_rules('observacoes', 'Observações', 'required');
        $this->form_validation->set_rules('produto[]', 'Produto', 'required');
        $this->form_validation->set_rules('preco[]', 'Preço', 'required');
        $this->form_validation->set_rules('quantidade[]', 'Quantidade', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->formCadastrar();
        } else {
            $pedido['id_fornecedor'] = $this->input->post('fornecedor');
            $pedido['observacoes'] = $this->input->post('observacoes');
            $id_pedido = $this->PedidosModel->adicionarPedido($pedido);
            for ($i = 0; $i < count($dados['produto']); $i++) {
                $itens['id_produto'] = $dados['produto'][$i];
                $itens['preco'] = $dados['preco'][$i];
                $itens['quantidade'] = $dados['quantidade'][$i];
                $itens['id_pedido'] = $id_pedido;
                $this->PedidosModel->adicionarItensPedido($itens);
            }
            $this->session->set_flashdata('mensagem', 'Pedido Adicionado Com Sucesso!!!');
            redirect(base_url('listar-pedidos'));
        }
    }

    public function formEditar($id)
    {
        $dados['pedido'] = $this->PedidosModel->getPedido($id);
        $dados['fornecedores'] = $this->ColaboradorModel->listarFornecedores();
        $dados['itens'] = $this->PedidosModel->getItens($id);
        $dados['produtos'] = $this->ProdutosModel->listarProdutosAtivos();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('pedidos/editar', $dados);
        $this->load->view('footer');
    }

    public function editar($id)
    {
        $produto =  $this->PedidosModel->getPedido($id);
        if ($produto['status'] == "Finalizado") {
            $this->session->set_flashdata('mensagem', 'Pedido Finalizado. Não é Possível Fazer Edição');
            redirect(base_url("formulario-editar-pedido/$id"));
        }
        $dados = elements(array('produto', 'preco', 'quantidade'), $this->input->post());
        $this->form_validation->set_rules('fornecedor', 'Nome do Colaborador', 'required');
        $this->form_validation->set_rules('observacoes', 'Observações', 'required');
        $this->form_validation->set_rules('produto[]', 'Produto', 'required');
        $this->form_validation->set_rules('preco[]', 'Preço', 'required');
        $this->form_validation->set_rules('quantidade[]', 'Quantidade', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->formCadastrar();
        } else {
            $pedido['id_fornecedor'] = $this->input->post('fornecedor');
            $pedido['observacoes'] = $this->input->post('observacoes');
            $this->PedidosModel->editarPedido($id, $pedido);
            $this->PedidosModel->deleteItensPedido($id);
            for ($i = 0; $i < count($dados['produto']); $i++) {
                $itens['id_produto'] = $dados['produto'][$i];
                $itens['preco'] = $dados['preco'][$i];
                $itens['quantidade'] = $dados['quantidade'][$i];
                $itens['id_pedido'] = $id;
                $this->PedidosModel->adicionarItensPedido($itens);
            }
            $this->session->set_flashdata('mensagem', 'Pedido Atualizado Com Sucesso!!!');
            redirect(base_url('listar-pedidos'));
        }
    }

    public function finalizar($id)
    {
        $this->PedidosModel->editarPedido($id, array('status' => 'Finalizado'));
        $this->session->set_flashdata('mensagem', 'Pedido Finalizado Com Sucesso!!!');
        redirect(base_url('listar-pedidos'));
    }

    // public function inativar($id)
    // {
    //     $this->ProdutosModel->editarProduto($id, array('status' => 'Inativo'));
    //     $this->session->set_flashdata('mensagem', 'Produto Inativado Com Sucesso!!!');
    //     redirect(base_url('listar-produto'));
    // }
}
