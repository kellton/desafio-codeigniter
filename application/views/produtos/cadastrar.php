<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
    <h3>ADICIONAR PRODUTO</h3>
    <hr>
    <div>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>'); ?>
    </div>
    <form action="<?php echo base_url('cadastrar-produto') ?>" method="POST" accept-charset="utf-8">
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Nome do Produto</label><input name="nome" type="text" class="form-control" value="<?php echo set_value('nome'); ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Quantidade</label><input name="quantidade" type="number" class="form-control" value="<?php echo set_value('quantidade'); ?>" required>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <label class="form-label">Preço</label>
                <div class="col-6 mb-3 input-group">
                    <span class="input-group-text">R$</span>
                    <input name="preco" type="text" class="form-control" value="<?php echo set_value('preco'); ?>" required>
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" rows="5" name="descricao" required><?php echo set_value('descricao'); ?></textarea>
                </div>
            </div>
        </div>
        <button type=" submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>