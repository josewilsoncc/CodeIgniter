<?php
if (!function_exists('reload_page')) {

  /**
   * Produce una etiqueta javascript en cuya logíca, se recarga la pagína
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 12/12/2014
   */
  function reload_page() {
    ?>
    <script>
      location.reload(true);
    </script>
    <?php
  }

}

if (!function_exists('base_url_js')) {

  /**
   * Incluye la funcion 'base_url()' en javascript, debe llamarse asi base_url_js();
   * 
   * @param boolean $include_index Indica si se incluye o no el index.php en la URL base.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 18/11/2014
   * @update 19/12/1014
   */
  function base_url_js($include_index = true) {
    ?>
    <script>
      function base_url() {
        return '<?php echo $include_index ? base_url() . 'index.php/' : base_url(); ?>';
      }
    </script>
    <?php
  }

}

if (!function_exists('show_message')) {

  /**
   * Genera un div con un mensaje si el mensaje no esta vacio
   * 
   * @param string $message Es el mensaje a mostrar
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>MCP_TYPE</b> Es el tipo de mensaje, define color estandar y si no se especifica define el icono. Los
   * posibles tipos son:
   * 
   * <i>danger</i>: Mensaje de error importante.<br>
   * <i>warning</i>: Mensaje de alerta importante.<br>
   * <i>info</i>: Mensaje que informativo aunque no es tan importante.<br>
   * <i>success</i> :Mensaje de accion importante ejecutada correctamente.
   * 
   * string <b>'icon'</b> Es el id de iconmoon del icono a usar, el cual reemplaza el icono por defecto.
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 12/12/2014
   */
  function show_message($message, $params = '') {
    if ($message) {
      $type = isset($params['type']) ? $params['type'] : 'success';
      switch ($type) {
        case 'success':$icon = 'checkmark';
          break;
        case 'info':$icon = 'info2';
          break;
        case 'warning':$icon = 'warning';
          break;
        case 'danger':$icon = 'spam';
          break;
      }
      $icon = isset($params['icon']) ? $params['icon'] : $icon;
      $id = isset($params['id']) ? $params['id'] : 'show_message';
      $class = isset($params['class']) ? $params['class'] : '';
      $auto_hide = isset($params['auto_hide']) && $params['auto_hide'] == true ? 'auto_hide' : '';
      ?>
      <div id="<?php echo $id; ?>" class="show_message alert alert-<?php echo $type . ' ' . $class . ' ' . $auto_hide; ?>" role="alert">
        <center>
          <table>
            <tr>
              <td><span class="icon icon-<?php echo $icon; ?> text_200" aria-hidden="true"></span></td>
              <td><?php echo $message ?></td>
            </tr>
          </table>
        </center>
      </div>
      <?php
    }
  }

}

if (!function_exists('create_select')) {

  /**
   * Genera el codigo html de un select con las opciones dadas
   * 
   * @param string $name Es el name e id del select
   * @param array $options Son las opciones del select
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>'selected'</b> Es el indice de la opcion seleccionada por defecto
   * 
   * string <b>'html'</b> Es codigo html (parametros) extra para la etiqueta select.
   * 
   * string <b>'ucfirst'</b> Pone la primer letra cada option en mayuscula y las demas en minuscula
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 20/11/2014
   */
  function create_select($name, $options, $params = '') {
    $selected = isset($params['selected']) ? $params['selected'] : 0;
    $html = isset($params['html']) ? $params['html'] : '';
    $ucfirst = isset($params['ucfirst']) ? $params['ucfirst'] : false;
    $class = isset($params['class']) ? 'class="' . $params['class'] . '"' : '';
    $onchange = isset($params['onchange']) ? 'onchange="' . $params['onchange'] . '"' : '';
    echo "<select name='$name' id='$name' $html $class $onchange>";
    $i = 0;
    foreach ($options as $key => $value) {
      $option = '<option value="' . trim($key) . '"' . set_select($name, $key, ($i == $selected)) . '>';
      $option.=$ucfirst ? ucfirst(strtolower($value)) : $value;
      $option.='</option>';
      echo $option;
      $i++;
    }
    echo "</select>";
  }

}

if (!function_exists('caruosel')) {

  /**
   * Genera el codigo html de un carrusel en bootstrap
   * 
   * @param array $elements Es un arreglo con los elementos a mostrar en el carrusel, su formato depende del tipo del
   * carrusel a crear, los formatos segun el tipo son:
   * 
   * <b>para <i>'images'</i> e <i>'hiden_images'</i></b>:<br>
   * array(<br>
   *   'carpeta_o_ruta/nombre_imagen.extensión',<br>
   *   'carpeta_o_ruta/nombre_imagen.extensión',<br>
   *   <i>... Asi N veces ...</i><br>
   * );
   * 
   * <b>para <i>'basic'</i></b>:<br>
   * array(<br>
   *   'Titulo a mostrar' => array(<br>
   *     '<b>label</b>' => 'Sub titulo a mostrar',<br>
   *     '<b>text</b>' => 'Texto a mostrar'<br>
   *   ),<br>
   *   'Titulo a mostrar' => array(<br>
   *     '<b>label</b>' => 'Sub titulo a mostrar',<br>
   *     '<b>text</b>' => 'Texto a mostrar'<br>
   *   )<br>
   *   <i>... Asi N veces ...</i><br>
   * );
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>'type'</b> Define el tipo de carrusel, los tipos existentes son: 'images', 'hiden_images', 'basic'.<br>
   * 
   * string <b>MCP_I</b> Es el indice incial del carrusel.<br>
   * 
   * string <b>'id'</b> Es el id del div del carrusel al cual los botones de navegación hacen referencia.<br>
   * 
   * string <b>'interval'</b> Es el intervalo del tiempo en que el carrusel cambiara de diapositiva si no tiene el cursor
   * encima.<br>
   * 
   * string <b>'class_slide'</b> Son las clases aplicadas a cada dispositiva separadas por espacio, tambien sera aplicada
   * al div 'show_images' en el caso del carrusel tipo 'hiden_images'.<br>
   * 
   * string <b>'class_basic_title'</b> Son las clases aplicadas a el titulo de un carrusel de tipo 'basic' separadas por
   * espacio.<br>
   * 
   * string <b>'class_images'</b> Son las clases aplicadas a las imagenes de un carrusel de tipo 'images' o
   * 'hiden_images' separadas por espacio.<br>
   * 
   * string <b>'class_div'</b> Son las clases aplicadas a las imagenes de un carrusel de tipo 'images' o 'hiden_images'
   * separadas por espacio.<br>
   * 
   * string <b>'hidden_images_title'</b> Es el título mostrado en un carrusel de tipo 'hiden_images'.<br>
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 18/12/2014
   */
  function caruosel($elements, $params = '') {
    $type = isset($params['type']) ? $params['type'] : 'images';
    $index = isset($params[MCP_I]) ? $params[MCP_I] : 0;
    $id = isset($params['id']) ? $params['id'] : 'my_caruosel';
    $interval = isset($params['interval']) ? $params['interval'] : 3000;
    $class_slide = isset($params['class_slide']) ? $params['class_slide'] : '';
    $class_basic_title = isset($params['class_basic_title']) ? $params['class_basic_title'] : '';
    $class_images = isset($params['class_images']) ? $params['class_images'] : '';
    $class_div = isset($params['class_div']) ? $params['class_div'] : $type == 'hiden_images' ? 'div_carusel_hiden' : 'div_carusel';
    $hidden_images_title = isset($params['hidden_images_title']) ? $params['hidden_images_title'] : 'Pasa el puntero para ver y ocultar el contenido...';
    ?>
    <?php
    if ($type == 'hiden_images') {
      asset_tag(MC_JS, MCU_HE . 'carousel');
      script_onready("my_ci_carousel('$class_div');");
      ?>
      <div class="show_images <?php echo $class_slide; ?>"><br><center><span class="icon icon-info"></span><?php echo $hidden_images_title; ?></center><br></div>
    <?php } ?>
    <div class="<?php echo $class_div; ?>">
      <div id="<?php echo $id; ?>" class="carousel slide" data-interval="<?php echo $interval; ?>" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators alpha_hover_10">
          <?php
          for ($i = 0; $i < count($elements); $i++) {
            ?>
            <li data-target="#<?php echo $id; ?>" data-slide-to="<?php echo $i; ?>" class="<?php echo $index == $i ? 'active' : ''; ?>"></li>
            <?php
          }
          ?>
        </ol>  
        <!-- Carousel items -->
        <div class="carousel-inner">
          <?php
          $i = 0;
          switch ($type) {
            case 'images':
            case 'hiden_images':
              foreach ($elements as $key => $value) {
                ?>
                <div class="<?php
                echo $class_slide . ' ';
                echo $i == $index ? 'active' : '';
                ?> item">
                  <center><img  class="img-rounded <?php echo $class_images; ?>" src="<?php echo base_url(); ?>assets/images/<?php echo $value; ?>"></center>
                </div>
                <?php
                $i++;
              }
              break;
            case 'basic':
              foreach ($elements as $key => $value) {
                ?>
                <div class="<?php
                echo $class_slide . ' ';
                echo $i == $index ? 'active' : '';
                ?> item">
                  <h2 class="<?php echo $class_basic_title; ?>"><?php echo $key; ?></h2>
                  <div class="carousel-caption">
                    <h3><?php echo $value['label']; ?></h3>
                    <p><?php echo $value['text']; ?></p>
                  </div>
                </div>
                <?php
                $i++;
              }
              break;
          }
          ?>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#<?php echo $id; ?>" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="carousel-control right" href="#<?php echo $id; ?>" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
    </div>
    <?php
  }

}

if (!function_exists('coverflow')) {

  /**
   * Genera el codigo html de un coverflow
   * 
   * @param array $elements Es el arreglo de imagenes en formato AM
   * 
   * @param array $params Es el arreglo de parametros, su KEY indica el parametro y su VALUE el valor del parametro,
   * esto de la siguiente manera:
   * 
   * int <b>MCP_I</b> Es el indice de la imagen a mostrar inicialmente.
   *
   * int <b>'density'</b> Indica que tantas imagenes seran mostradas a los costados.
   * 
   * int <b>'inner_offset'</b> Indica la distancia entre las imagenes.
   * 
   * float <b>'inner_scale'</b> Indica el porcentaje de tamaño que adquieren las imagenes de los costados con respecto a
   * la imagen central en porcentaje.
   * 
   * string <b>'on_confirm'</b> Función JavaScript a llamar cuando se da click a la imagen central.
   * 
   * string <b>MCP_CE</b> Extensión común para todas las imagenes.
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 29/12/2014
   */
  function coverflow($elements, $params = '') {
    $elements = am($elements);
    $index = isset($params[MCP_I]) ? $params[MCP_I] : (int) (count($elements) / 2);
    $density = isset($params['density']) ? $params['density'] : 2;
    $innerOffset = isset($params['inner_offset']) ? $params['inner_offset'] : 50;
    $innerScale = isset($params['inner_scale']) ? $params['inner_scale'] : .5;
    $on_confirm = isset($params['on_confirm']) ? $params['on_confirm'] : 'coverflow_confirm';
    $common_extension = isset($params[MCP_CE]) ? '.' . $params[MCP_CE] : '';

    load_assets(array(MC_JS => array(
        'default/jquery' => array(
          'jquery.coverflow',
          'jquery.interpolate',
          'jquery.mousewheel.min',
          'jquery.touchSwipe.min',
          'reflection'
        )
    )));
    ?>
    <center>
      <div id="view-coverflow">
        <?php
        foreach ($elements as $value)
          echo '<img class="cover" src="' . base_url_images(array(MCP_OR => true)) . $value . $common_extension . '"/>';
        ?>
      </div>
    </center>
    <?php
    asset_tag(MC_CSS, MCU_HE . 'coverflow');
    asset_tag(MC_JS, MCU_HE . 'coverflow');
    script_onready("my_ci_coverflow($index, $density, $innerOffset, $innerScale, $on_confirm);");
  }

}

if (!function_exists('paginator')) {

  /**
   * Produce un paginador de CodeIgniter con los estilos de Bootstrap.
   * 
   * @param string $uri Es la uri despues del base_url para la paginación
   * 
   * @param int $total_rows Es el numero total de elementos a paginar
   * 
   * @param int $per_page Es el numero de elementos por página a mostrar
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 31/12/2014
   */
  function paginator($uri, $total_rows, $per_page) {
    $config['base_url'] = base_url() . $uri;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;

    $config['full_tag_open'] = '<center><ul class="pagination">';
    $config['full_tag_close'] = '</ul></center>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $ci = & get_instance();
    $ci->load->library('pagination');
    $ci->pagination->initialize($config);
    echo $ci->pagination->create_links();
  }

}

if (!function_exists('footer')) {

  /**
   * Produce un footer con base en los parametros
   * 
   * @param string/html $html Es el html a mostrar en el footer
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 31/12/2014
   */
  function footer($html) {
    ?>
    <ul class="footer list-group text-center text-muted">
      <li class="list-group-item"><?php echo $html; ?></li>
    </ul>
    <?php
  }

}

if (!function_exists('script_onready')) {

  /**
   * Ejecuta el script pasado como parametro, cuando la pagina termina de cargar
   * 
   * @param string $script Es el script a ejecutar cuando la página carge
   * 
   * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 2015/01/06
   */
  function script_onready($script) {
    ?>
    <script>
      $(function () {
    <?php echo $script; ?>
      });
    </script>
    <?php
  }

}  