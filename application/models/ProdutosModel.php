<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdutosModel extends CI_Model
{
    /*
     * ADICIONAR_PRODUTO
     * ---------------------------------------
     * DESCRICAO : INSERÇÕES NA TABELA PRODUTOS
     * ---------------------------------------
     * PARAMETROS : $dados
     * ---------------------------------------
     * RETORNO : bool
    */
    public function adicionarProduto($dados)
    {
        try {
            $this->db->insert('tb_produtos', $dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - ADICIONAR PRODUTO - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }

    /*
     * LISTAR_PRIDUTOS
     * ---------------------------------------
     * DESCRICAO : LISTAGEM DE TODOS PRIDUTOS CADASTRADOS
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : array
    */
    public function listarProdutos()
    {
        try {
            return $this->db->get('tb_produtos')->result();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - LISTAR PRODUTOS - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * LISTAR_PRIDUTOS_ATIVOS
     * ---------------------------------------
     * DESCRICAO : LISTAGEM DE TODOS PRIDUTOS ATIVOS CADASTRADOS
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : array
    */
    public function listarProdutosAtivos()
    {
        try {
            $this->db->where('status','Ativo');
            return $this->db->get('tb_produtos')->result_array();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - LISTAR PRODUTOS - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * GET_PRIDUTO
     * ---------------------------------------
     * DESCRICAO : PEGA UM PRODUTO PELO ID
     * ---------------------------------------
     * PARAMETROS : $id
     * ---------------------------------------
     * RETORNO : array
    */
    public function getProduto($id)
    {
        try {
            $this->db->where('id', $id);
            return $this->db->get('tb_produtos')->row_array();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - GET PRODUTO - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * EDITAR_PRODUTO
     * ---------------------------------------
     * DESCRICAO : FAZ A EDIÇÃO DOS DADOS DE UM PRODUTO
     * ---------------------------------------
     * PARAMETROS : $id, $dados
     * ---------------------------------------
     * RETORNO : array
    */

    public function editarProduto($id,$dados) {
        try {
            $this->db->where('id',$id);
            $this->db->update('tb_produtos',$dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - EDIÇÃO DE DADOS PRODUTO  - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }
}
