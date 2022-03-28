<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<h3>PÁGINA INICIAL - LOGIN</h3>
<hr>
<div class="row">
	<?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>'); ?>
	<form action="<?php echo base_url('validacao') ?>" method="POST" accept-charset="utf-8">
		<div class="mb-3">
			<label class="form-label">Login</label>
			<input type="text" class="form-control" name="login" value="<?php echo set_value('login'); ?>">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Senha</label>
			<input type="password" class="form-control" name="senha">
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</div>