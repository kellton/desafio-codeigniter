<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
    <h3>EDITAR FORNECEDOR</h3>
    <hr>
    <div>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>');

        if ($this->session->flashdata('mensagem')) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->session->flashdata('mensagem') . '</div>';
        } ?>
    </div>
    <form action="<?php echo base_url('editar-colaborador/' . $colaborador['id_colaborador']) ?>" method="POST" accept-charset="utf-8">
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Nome do Colaborador</label><input name="nome" type="text" class="form-control" value="<?php echo set_value('nome', $colaborador['nome']); ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Email</label><input name="email" type="email" class="form-control" value="<?php echo set_value('email', $colaborador['email']); ?>" required>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Telefone</label><input name="telefone" id="telefone" type="text" class="form-control" value="<?php echo set_value('telefone', $colaborador['telefone']); ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Setor</label><input name="setor" type="text" class="form-control" value="<?php echo set_value('setor', $colaborador['setor']); ?>" required>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">CPF</label>
                    <input name="cpf" id="cpf" type="text" class="form-control" value="<?php echo set_value('cpf', $colaborador['cpf']); ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" disabled>
                        <option value="Ativo" <?php echo $colaborador['status'] == "Ativo" ? "selected" : ""; ?>>ATIVO</option>
                        <option value="Inativo" <?php echo $colaborador['status'] == "Inativo" ? "selected" : ""; ?>>INATIVO</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col">
            <label class="form-label">É fornecedor?</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fornecedor" value="Sim" <?php echo set_radio('fornecedor', 'Sim', $colaborador['fornecedor'] == "Sim" ? TRUE : FALSE); ?>>
                <label class="form-check-label">
                    Sim
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fornecedor" value="Não" <?php echo set_radio('fornecedor', 'Não', $colaborador['fornecedor'] == "Não" ? TRUE : FALSE); ?>>
                <label class="form-check-label">
                    Não
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $(".acesso_portal").change(function() {
            if ($(this).val() == "Sim") {
                $(".login_senha_valor").show();
            } else {
                $(".login_senha_valor").hide();
            }
        });
        if ($("input[type=radio][name=acesso_portal]:checked").val() == "Sim") {
            $(".login_senha_valor").show();
        } else {
            $(".login_senha_valor").hide();
        }
    });

    var behavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(behavior.apply({}, arguments), options);
            }
        };

    $('#telefone').mask(behavior, options);
    $("#cpf").mask("999.999.999-99");
</script>