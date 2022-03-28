<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
    <h3>EDITAR PRODUTOS</h3>
    <hr>
    <div>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>');

        if ($this->session->flashdata('mensagem')) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->session->flashdata('mensagem') . '</div>';
        } ?>
    </div>
    <form action="<?php echo base_url('editar-produto/' . $produto['id']) ?>" method="POST" accept-charset="utf-8">
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Nome do Produto</label><input name="nome" type="text" class="form-control" value="<?php echo set_value('nome', $produto['nome']); ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Quantidade</label><input name="quantidade" type="number" class="form-control" value="<?php echo set_value('quantidade', $produto['quantidade']); ?>" required>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <label class="form-label">Preço</label>
                <div class="col-6 mb-3 input-group">
                    <span class="input-group-text">R$</span>
                    <input name="preco" type="text" class="form-control" value="<?php echo set_value('preco', $produto['preco']); ?>" required>
                    <span class="input-group-text">.00</span>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" disabled>
                        <option value="Ativo" <?php echo $produto['status'] == "Ativo" ? "selected" : ""; ?>>ATIVO</option>
                        <option value="Inativo" <?php echo $produto['status'] == "Inativo" ? "selected" : ""; ?>>INATIVO</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" rows="5" name="descricao" required><?php echo set_value('descricao', $produto['descricao']); ?></textarea>
                </div>
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary">Editar</button>
</form>
</div>