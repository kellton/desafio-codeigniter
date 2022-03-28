<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PedidosModel extends CI_Model
{
    /*
     * ADICIONAR_PEDIDO
     * ---------------------------------------
     * DESCRICAO : INSERÇÕES NA TABELA PEDIDOS
     * ---------------------------------------
     * PARAMETROS : $dados
     * ---------------------------------------
     * RETORNO : bool
    */
    public function adicionarPedido($dados)
    {
        try {
            $this->db->insert('tb_pedidos', $dados);
            return $this->db->insert_id();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - ADICIONAR PEDIDO - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }

    /*
     * LISTAR_PEDIDOS
     * ---------------------------------------
     * DESCRICAO : LISTAGEM DE TODOS PEDIDOS CADASTRADOS
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : array
    */
    public function listarPedidos()
    {
        try {
            $this->db->select('tb_colaborador.nome,tb_pedidos.id,tb_pedidos.observacoes,tb_pedidos.status,tb_pedidos.data_cadastro');
            $this->db->from('tb_pedidos');
            $this->db->join('tb_colaborador', 'tb_pedidos.id_fornecedor = tb_colaborador.id_colaborador');
            return $this->db->get()->result();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - LISTAR PEDIDOS - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * ADICIONAR_ITENS_PEDIDO
     * ---------------------------------------
     * DESCRICAO : LISTAGEM DE TODOS PEDIDOS CADASTRADOS
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : array
    */

    public function adicionarItensPedido($dados)
    {
        try {
            $this->db->insert('tb_produtos_pedido', $dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - ADICIONAR ITENS PEDIDO - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }

        /*
         * GET_PEDIDO
         * ---------------------------------------
         * DESCRICAO : PEGA UM PEDIDO PELO ID
         * ---------------------------------------
         * PARAMETROS : $id
         * ---------------------------------------
         * RETORNO : array
        */
        public function getPedido($id)
        {
            try {
                $this->db->where('id', $id);
                return $this->db->get('tb_pedidos')->row_array();
            } catch (Exception $e) {
                log_message('error', 'ERRO SGBD - GET PEDIDO - ' . $e->getMessage());
                return FALSE;
            }
        }

        /*
         * DELETE_ITENS_PEDIDO
         * ---------------------------------------
         * DESCRICAO : EXCLUI TODOS OS ITENS DO PEDIDO
         * ---------------------------------------
         * PARAMETROS : $id
         * ---------------------------------------
         * RETORNO : bool
        */
        public function deleteItensPedido($id)
        {
            try {
                $this->db->where('id_pedido', $id);
                return $this->db->delete('tb_produtos_pedido');
            } catch (Exception $e) {
                log_message('error', 'ERRO SGBD - EXCLUI ITENS PEDIDO - ' . $e->getMessage());
                return FALSE;
            }
        }

        /*
         * EDITAR_PEDIDO
         * ---------------------------------------
         * DESCRICAO : FAZ A EDIÇÃO DOS DADOS DE UM PEDIDO
         * ---------------------------------------
         * PARAMETROS : $id, $dados
         * ---------------------------------------
         * RETORNO : array
        */

        public function editarPedido($id,$dados) {
            try {
                $this->db->where('id',$id);
                $this->db->update('tb_pedidos',$dados);
            } catch (Exception $e) {
                log_message('error', 'ERRO SGBD - EDIÇÃO DE DADOS PEDIDO  - ' . $e->getMessage());
                return FALSE;
            }
            return TRUE;
        }

        /*
         * GET_ITENS
         * ---------------------------------------
         * DESCRICAO : PEGA ITENS DE UM PEDIDO
         * ---------------------------------------
         * PARAMETROS : $id
         * ---------------------------------------
         * RETORNO : array
        */

        public function getItens($id) {
            try {
                $this->db->where('id_pedido',$id);
                return $this->db->get('tb_produtos_pedido')->result();
            } catch (Exception $e) {
                log_message('error', 'ERRO SGBD - PEGA ITENS DE UM PEDIDO  - ' . $e->getMessage());
                return FALSE;
            }
            return TRUE;
        }
}
