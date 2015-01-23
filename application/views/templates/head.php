<head>
  <title>
    <?php
    if (isset($title))
      echo $title;
    else
      echo PROJECT_TITLE;
    ?>
  </title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1"/>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icons/logotipo.ico"/>
  <!--[if lt IE 9]>
    <script src='//html5shiv.googlecode.com/svn/trunk/html5.js'></script>
  <!--[endif]-->

  <?php
  base_url_js();

  /*
   * Cargar assets del proyecto
   */

  load_assets(array(
    MC_CSS => array(
      'default' => array(
        'bootstrap' => array(
          'bootstrap.min',
          'bootstrap-theme.min'
        ),
        'icons',
        'alertify' => array(
          'alertify.min',
          'themes/default.min'
        ),
        'toastr.min'
      )
    ),
    MC_LESS => array(
      'default/basic'
    ),
    MC_JS => array(
      'default' => array(
        'jquery' => array(
          'jquery.min',
          'jquery-ui.min'
        ),
        'bootstrap.min',
        'less.min',
        'alertify.min',
        'toastr.min',
        'my_ci'
      )
    )
  ));

  $this->load->view('templates/_assets');
  ?>
</head>