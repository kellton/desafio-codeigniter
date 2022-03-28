<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<h3>PEDIDOS</h3>
<hr>
<?php
if ($this->session->flashdata('mensagem')) {
    echo '<div class="alert alert-success alert-dismissible" role="alert">' . $this->session->flashdata('mensagem') . '</div>';
} ?>
<a href="<?php echo base_url('formulario-pedidos'); ?>" class="btn btn-primary" role="button">Adicionar Pedido</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Fornecedor</th>
            <th scope="col">Observações</th>
            <th scope="col">Status</th>
            <th scope="col">Data De Cadastro</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedidos as $valor) {
            echo "<tr>";
            echo "<td>$valor->nome</td>";
            echo "<td>".mb_strimwidth($valor->observacoes, 0, 100, "...")."</td>";
            echo "<td>$valor->status</td>";
            echo "<td>$valor->data_cadastro</td>";
            echo '<td class="icon text-center"><a href=' . base_url('formulario-editar-pedido/' . $valor->id) . '><i class="fa-solid fa-pencil"></i></a>';
            echo $valor->status != "Finalizado" ? '<a role="button" class="btn btn-success btn-sm" href=' . base_url('finalizar-pedido/' . $valor->id) . '>Finalizar</a>' : "";
            echo '</td>';
            echo "</tr>";
        } ?>
    </tbody>
</table>