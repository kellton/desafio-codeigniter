<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
    <h3>ADICIONAR FORNECEDOR</h3>
    <hr>
    <div>
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>'); ?>
    </div>
    <form action="<?php echo base_url('cadastrar-colaborador') ?>" method="POST" accept-charset="utf-8">
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Nome do Colaborador</label><input name="nome" type="text" class="form-control" value="<?php echo set_value('nome'); ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Email</label><input name="email" type="email" class="form-control" value="<?php echo set_value('email'); ?>" required>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">Telefone</label><input name="telefone" id="telefone" type="text" class="form-control" value="<?php echo set_value('telefone'); ?>" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label">Setor</label><input name="setor" type="text" class="form-control" value="<?php echo set_value('setor'); ?>" required>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label">CPF</label><input name="cpf" id="cpf" type="text" class="form-control" value="<?php echo set_value('cpf'); ?>" required>
                </div>
            </div>
        </div>
        <div class="col">
            <label class="form-label">É fornecedor?</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fornecedor" value="Sim" <?php echo set_radio('fornecedor', 'Sim'); ?>>
                <label class="form-check-label">
                    Sim
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fornecedor" value="Não" <?php echo set_radio('fornecedor', 'Não', TRUE); ?>>
                <label class="form-check-label">
                    Não
                </label>
            </div>
        </div>
        <div class="col">
            <label class="form-label">Tem Acesso ao Portal?</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input acesso_portal" type="radio" name="acesso_portal" value="Sim" <?php echo set_radio('acesso_portal', 'Sim'); ?>>
                <label class="form-check-label">
                    Sim
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input acesso_portal" type="radio" name="acesso_portal" value="Não" <?php echo set_radio('acesso_portal', 'Não', TRUE); ?>>
                <label class="form-check-label">
                    Não
                </label>
            </div>
            <div class="login_senha_valor">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Login</label><input name="login" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Senha</label><input name="senha" type="password" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Repetir Senha</label><input name="r_senha" type="password" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
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