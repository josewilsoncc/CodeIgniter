<!doctype html>
<html>
  <?php $this->load->view('templates/head'); ?>
  <body>
    <?php
    autoloading_assets($content, array(MCP_DEBUG=>FALSE));
    show_message($this->session->userdata('console'), array(MCP_TYPE=>'info'));
    $this->session->unset_userdata('console');
    $this->load->view('templates/header');
    $this->load->view($content);
    $this->load->view('templates/footer');
    ?>
  </body>
</html>