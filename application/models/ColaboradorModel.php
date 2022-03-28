<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ColaboradorModel extends CI_Model
{
    /*
     * ADICIONAR_COLABORADOR
     * ---------------------------------------
     * DESCRICAO : INSERÇÕES NA TABELA COLABORADORES
     * ---------------------------------------
     * PARAMETROS : $dados
     * ---------------------------------------
     * RETORNO : bool
    */
    public function adicionarColaborador($dados)
    {
        try {
            $this->db->insert('tb_colaborador', $dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - ADICIONAR COLABORADOR - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }

    /*
     * LISTAR_COLABORADORES
     * ---------------------------------------
     * DESCRICAO : LISTAGEM DE TODOS COLABORADORES CADASTRADOS
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : array
    */
    public function listarColaboradores()
    {
        try {
            return $this->db->get('tb_colaborador')->result();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - LISTAR COLABORADORES - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * LISTAR_FORNECEDORES
     * ---------------------------------------
     * DESCRICAO : LISTAGEM DE TODOS FORNECEDORES CADASTRADOS
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : array
    */
    public function listarFornecedores()
    {
        try {
            $this->db->select('id_colaborador,nome');
            $this->db->where('fornecedor','Sim');
            return $this->db->get('tb_colaborador')->result();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - LISTAR COLABORADORES - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * GET_COLABORADORES
     * ---------------------------------------
     * DESCRICAO : PEGA UM COLABORADOR PELO ID
     * ---------------------------------------
     * PARAMETROS : $id
     * ---------------------------------------
     * RETORNO : array
    */
    public function getColaborador($id)
    {
        try {
            $this->db->where('id_colaborador', $id);
            return $this->db->get('tb_colaborador')->row_array();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - GET COLABORADOR - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * EDITAR_COLABORADORES
     * ---------------------------------------
     * DESCRICAO : FAZ A EDI~C"AO DOS DADOS DE UM COLABORADOR
     * ---------------------------------------
     * PARAMETROS : $id, $dados
     * ---------------------------------------
     * RETORNO : array
    */

    public function editarColaborador($id,$dados) {
        try {
            $this->db->where('id_colaborador',$id);
            $this->db->update('tb_colaborador',$dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - EDITAR COLABORADOR  - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }
}
