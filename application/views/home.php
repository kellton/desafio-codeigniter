<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<h3>Pagina Inicial</h3>
<hr>
<div class="row text-center">
    <div class="col-4">
        <div class="card" style="width: 18rem;">
        <i class="fa-solid fa-people-group fa-4x"></i>
            <div class="card-body">
                <h5 class="card-title">Colaboradores</h5>
                <a href="<?php echo base_url("listar-colaborador")?>" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="width: 18rem;">
        <i class="fa-solid fa-shop fa-4x mt-1"></i>
            <div class="card-body">
                <h5 class="card-title">Produtos</h5>
                <a href="<?php echo base_url("listar-produto")?>" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="width: 18rem;">
        <i class="fa-solid fa-cart-shopping fa-4x mt-1"></i>
            <div class="card-body">
                <h5 class="card-title">Pedidos</h5>
                <a href="<?php echo base_url("listar-pedidos")?>" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
</div>