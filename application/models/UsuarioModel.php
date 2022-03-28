<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsuarioModel extends CI_Model
{
    /*
     * ADICIONAR_USUAROP
     * ---------------------------------------
     * DESCRICAO : INSERÇÕES NA TABELA USUARIO
     * ---------------------------------------
     * PARAMETROS : $dados
     * ---------------------------------------
     * RETORNO : bool
    */
    public function adicionarUsuario($dados)
    {
        try {
            $this->db->insert('tb_usuario', $dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - ADICIONAR COLABORADOR - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }

    /*
     * EDITAR_USUARIO
     * ---------------------------------------
     * DESCRICAO : ATUALIZAÇÕES NA TABELA 
     * USUARIO
     * ---------------------------------------
     * PARAMETROS : N/A
     * ---------------------------------------
     * RETORNO : N/A
    */
    public function editar_usuario($dados, $id_usuario)
    {
        try {
            $this->db->where('id_usuario', $id_usuario);
            $this->db->update('tb_usuarios', $dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - EDITAR USUARIO  - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }

    /*
     * BUSCA_USUARIO
     * ---------------------------------------
     * DESCRICAO :BUSCA USUARIO CADASTRADO
     * ---------------------------------------
     * PARAMETROS : $login, $senha
     * ---------------------------------------
     * RETORNO : array
    */
    public function buscaUsuario($login, $senha)
    {
        try {
            $this->db->from('tb_usuario');
            $this->db->where('login', $login);
            $this->db->where('senha', $senha);
            $this->db->where('status', 'Ativo');
            return $this->db->get()->row();
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - BUSCAR USUARIO  - ' . $e->getMessage());
            return FALSE;
        }
    }

    /*
     * EDITAR_USUAROP
     * ---------------------------------------
     * DESCRICAO : FAZ A EDIÇÃO DOS DADOS DE UM USUÁRIO
     * ---------------------------------------
     * PARAMETROS : $email, $dados
     * ---------------------------------------
     * RETORNO : array
    */

    public function editarUsuario($email,$dados) {
        try {
            $this->db->where('email',$email);
            $this->db->update('tb_usuario',$dados);
        } catch (Exception $e) {
            log_message('error', 'ERRO SGBD - ADICIONAR DADOS EMPRESA CLIENTE  - ' . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }
}
