<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<h3>COLABORADOR</h3>
<hr>
<?php
if ($this->session->flashdata('mensagem')) {
    echo '<div class="alert alert-success alert-dismissible" role="alert">' . $this->session->flashdata('mensagem') . '</div>';
} ?>
<a href="<?php echo base_url('formulario-colaborador'); ?>" class="btn btn-primary" role="button">Adicionar Colaborador</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">CPF</th>
            <th scope="col">Data De Cadastro</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colaboradores as $valor) {
            echo "<tr>";
            echo "<td>$valor->nome</td>";
            echo "<td>$valor->email</td>";
            echo "<td>$valor->cpf</td>";
            echo "<td>$valor->data_cadastro</td>";
            echo "<td>$valor->status</td>";
            echo '<td class="icon"><a href=' . base_url('formulario-editar-colaborador/' . $valor->id_colaborador) . '><i class="fa-solid fa-pencil"></i></a> - ';
            echo $valor->status == "Ativo" ? '<a title="Inativar Colaborador" href=' . base_url('inativar-colaborador/' . $valor->id_colaborador) . '><i class="fa-solid fa-trash-can"></i></a>' : "";
            echo $valor->status == "Inativo" ? '<a title="Ativar Colaborador" href=' . base_url('ativar-colaborador/' . $valor->id_colaborador) . '><i class="fa-solid fa-check"></i></a>' : "";
            echo '</td>';
            echo "</tr>";
        } ?>
    </tbody>
</table>