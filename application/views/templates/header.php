<header>
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target=".navbar-ex1-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <?php echo PROJECT_NAME; ?>
      </a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav navbar-right">
        <?php if (!is_login()) { ?>
        <li><a href="<?php echo base_url(); ?>auth"><span class="icon icon-enter"></span>Ingresar</a></li>
          <li><a href="<?php echo base_url(); ?>home/help"><span class="icon icon-info2"></span>Ayuda</a></li>
        <?php } else { ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Cuenta<span class="icon icon-cog2"></span><b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
              <?php if(is_admin()){ ?>
              <li><a><center><span class="icon icon-user"></span>Usuario Master</center></a></li>
              <li class="divider"></li>
              <li><a href="#"><span class="icon icon-lock2"></span>Permisos del menú</a></li>
              <li><a href="#"><span class="icon icon-equalizer"></span>Distribución del menú</a></li>
              <?php } else {?>
              <li><a><center><span class="icon icon-user"></span><?php echo $this->session->userdata('nombre'); ?></center></a></li>
              <?php } ?>
              <li class="divider"></li>
              <li><a href="<?php echo base_url(); ?>auth/close_session"><span class="icon icon-exit"></span>Cerrar sesión</a></li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>