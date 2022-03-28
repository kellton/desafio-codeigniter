<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<h3>PRODUTOS</h3>
<hr>
<?php
if ($this->session->flashdata('mensagem')) {
    echo '<div class="alert alert-success alert-dismissible" role="alert">' . $this->session->flashdata('mensagem') . '</div>';
} ?>
<a href="<?php echo base_url('formulario-produto'); ?>" class="btn btn-primary" role="button">Adicionar Produto</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
            <th scope="col">Data De Cadastro</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $valor) {
            echo "<tr>";
            echo "<td>$valor->nome</td>";
            echo "<td>$valor->quantidade</td>";
            echo "<td>$valor->preco</td>";
            echo "<td>$valor->data_cadastro</td>";
            echo "<td>$valor->status</td>";
            echo '<td class="icon"><a href=' . base_url('formulario-editar-produto/' . $valor->id) . '><i class="fa-solid fa-pencil"></i></a> - ';
            echo $valor->status == "Ativo" ? '<a title="Inativar Produto" href=' . base_url('inativar-produto/' . $valor->id) . '><i class="fa-solid fa-trash-can"></i></a>' : "";
            echo $valor->status == "Inativo" ? '<a title="Ativar Produto" href=' . base_url('ativar-produto/' . $valor->id) . '><i class="fa-solid fa-check"></i></a>' : "";
            echo '</td>';
            echo "</tr>";
        } ?>
    </tbody>
</table>