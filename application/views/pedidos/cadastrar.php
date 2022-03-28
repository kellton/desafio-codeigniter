<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
    <h3>ADICIONAR PEDIDO</h3>
    <hr>
    <div>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>'); ?>
    </div>
    <form action="<?php echo base_url('cadastrar-pedido') ?>" method="POST" accept-charset="utf-8">
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Selecione um Fornecedor</label>
                    <select class="form-select" name="fornecedor" required>
                        <option value='' selected>Selecione um Fornecedor</option>
                        <?php
                        foreach ($fornecedores as $value) {
                            echo '<option value="' . $value->id_colaborador . '">' . $value->nome . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Observações</label>
                    <textarea class="form-control" rows="5" name="observacoes" required><?php echo set_value('observacoes'); ?></textarea>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <span>
                        <div class="lista_pedido">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <label class="form-label">Selecione um Produto</label>
                                            <select class="form-select" name="produto[]" required>
                                                <option value='' selected>Selecione um Produto</option>
                                                <?php
                                                foreach ($produtos as $valor) {
                                                    echo '<option value="' . $valor->id . '">' . $valor->nome . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label class="form-label">Quantidade</label><input name="quantidade[]" type="number" class="form-control" value="<?php echo set_value('quantidade'); ?>" required>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label class="form-label">Preço</label><input name="preco[]" type="text" class="form-control" value="<?php echo set_value('preco'); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>
                    <a class="btn btn-primary add_field_button" href="#">Adicionar Itens</a>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="Salvar">Salvar</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $(".add_field_button").click(function() {
            $("span").append($(".lista_pedido:first").clone(true));
        });
    });
</script>