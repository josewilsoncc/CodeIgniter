<?php show_message($this->session->flashdata('error'), array('type'=>'danger')); ?>
<div class = "container">
  <div class = "row">
    <div class = "col-lg-4"></div>
    <div class = "col-lg-4">
      <?php echo form_open(base_url() . 'auth/log_in', 'class="form-standar"'); ?>
      <center><h3 class="form-signin-heading">Por favor inicia sessión</h3></center>
        <?php
        echo form_input('username', '', 'placeholder="Usuario" class="form-control"');
        echo form_password('password', '', 'placeholder="Contraseña" class="form-control"');
        echo form_submit('send', 'Iniciar sesión', 'class="btn btn-md btn-success btn-block"');
        ?>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>