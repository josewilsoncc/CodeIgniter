<?php

/*
 * Este Helper es el encargado de todo lo referente a assets en el proyecto.
 * 
 * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
 * @date 2014/12/19
 */

if (!function_exists('asset_tag')) {

  /**
   * Incluye un archivo asset especificado.
   * 
   * @param string $route Es la ruta del archivo javascript sin extensión partiendo de la base URL y si no se presentan
   * varianciones por defecto buscara en los directorios:
   * assets/js/
   * assets/css/
   * assets/less/
   * Por ejemplo, para incluir el archivo
   * assets/js/mi_javascript.js se hace de esta manera: asset_tag(MC_JS, 'mi_javascript'); sin
   * importar desde que archivo o ruta se llame.
   * 
   * @param string $type_tag indica de que tipo es el asset con los valores MC_CSS, MC_JS y MC_LESS.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * boolean <b>$url_variant</b> debe ponerse en true si la url varia del directorio assets/js
   * 
   * string/boolean <b>MCP_OR</b> [developers] Funciona de la siguiente manera:
   * <br><br>+Si es TRUE el resultado sera retornado.
   * <br><br>+Si es FALSE el resultado sera impreso con un echo de manera automatica. (predeterminada)
   * <br><br>+si es MCI_R solamente retornara la ruta de la tag.
   * <br><br>+si es MCI_RF solamente imprimira la ruta de la tag con un echo de manera automatica.
   * <br><br>+si es MCI_RWBU retornará la ruta de la tag sin la url base.
   * <br><br>+si es MCI_RWBU_F solamente imprimira la ruta de la tag sin la url base con un echo de manera automatica.
   * <br><br>Es FALSE por defecto.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 2014/12/19
   * @update 2015/01/02
   */
  function asset_tag($type_tag, $route, $params = '') {
    $url_variant = isset($params['url_variant']) ? $params['url_variant'] : false;
    $only_return = isset($params[MCP_OR]) ? $params[MCP_OR] : false;

    $partial_route = 'assets/' . $type_tag . '/' . $route . '.' . $type_tag;

    if ($url_variant)
      $full_route = base_url() . $route;
    else
      $full_route = base_url() . $partial_route;

    switch ($type_tag) {
      case MC_CSS:
        $html = link_tag($full_route);
        break;
      case MC_LESS:
        $html = link_tag($full_route, 'stylesheet', 'text/less');
        break;
      case MC_JS:
        $html = '<script type="text/javascript" src="' . $full_route . '"></script>';
        break;
    }

    switch ($only_return) {
      case MCI_RWBU:
        return $partial_route;
      case MCI_RWBU_F:
        echo $partial_route;
        break;
      case MCI_R:
        return $full_route;
      case MCI_RF:
        echo $full_route;
        break;
      case TRUE:
        return $html;
      default:
        echo $html;
        break;
    }
  }

}

if (!function_exists('load_assets')) {

  /**
   * Incluye todos los assets (css, less, js) indicados en un arreglo.
   * 
   * @param $assets Es el arreglo de los assets a incluir, cuenta con 3 posibles posiciones fijas (MC_CSS, MC_LESS,
   * MC_JS) en formato AM, ejemplo:
   * 
   * load_assets(array(<br>
   *  MC_CSS => array(<br>
   *    'algun_css',<br>
   *    'otro',<br>
   *    'etc'<br>
   *  ),<br>
   *  MC_LESS => array(<br>
   *    'algun_less',<br>
   *    '<i>etc...</i>'<br>
   *  ),<br>
   *  MC_JS => array(<br>
   *    'algun_js',<br>
   *    '<i>etc...</i>'<br>
   *  )<br>
   * ));
   * 
   * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 19/12/2014
   */
  function load_assets($assets) {
    if (isset($assets[MC_CSS]))
      foreach (am($assets[MC_CSS]) as $value)
        asset_tag(MC_CSS, $value);
    if (isset($assets[MC_LESS]))
      foreach (am($assets[MC_LESS]) as $value)
        asset_tag(MC_LESS, $value);
    if (isset($assets[MC_JS]))
      foreach (am($assets[MC_JS]) as $value)
        asset_tag(MC_JS, $value);
  }

}

if (!function_exists('autoloading_assets')) {

  /**
   * 
   * <b>[Developer]</b> Incluye los archivos JavaScript, CSS o Less con base en los 3 primeros segmentos de la URI, debe
   * llamarse asi: autoloading_assets($mi_uri);
   * 
   * @param string $route_view Es la uri a analizar para realizar la carga automatica assets (JavaScript, CSS o Less).
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$file</b> Es el nombre del archivo JavaScript, CSS o Less sin la extensión del controlador que se
   * incluira, general (general.js) por defecto.
   * 
   * string <b>$and_method</b> Indica si debe incluir el JavaScript, CSS o Less estandar para la vista. Por ejemplo si
   * la URI es <i>my_ci/home/help</i> los archivos a incluir de manera automatica son:
   * <i>my_ci/assets/js/home/help.js</i>
   * <i>my_ci/assets/css/home/help.css</i>
   * <i>my_ci/assets/less/home/help.less</i>
   * 
   * boolean <b>MCP_OR</b> si es true el resultado será retornado en lugar de ser impreso con un echo de manera
   * automatica.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 16/11/2014
   * @update 15/01/2015
   */
  function autoloading_assets($route_view, $params = '') {
    $file = isset($params['file']) ? $params['file'] : 'general';
    $only_return = isset($params[MCP_OR]) ? $params[MCP_OR] : false;
    $debug = isset($params[MCP_DEBUG]) ? $params[MCP_DEBUG] : false;

    $exit_debug = '';

    $exit_debug.= $debug ? '<B>Full route_view: ' . $route_view . '</b>' : '';

    $route_segments = explode('/', $route_view);
    $html = '';

    for ($i = 0; $i < count($route_segments); $i++) {
      $route = '';
      for ($j = 0; $j <= $i; $j++) {
        if ($j === 0)
          $route.=$route_segments[$j];
        else
          $route.='/' . $route_segments[$j];
      }
      $route_asset_array[] = $route;
      $route_asset_array[] = $route . '/' . $file;
    }

    foreach ($route_asset_array as $route_asset) {
      $exit_debug .= $debug ? '<br>Load assets: "' . $route_asset . '" -> ' : '';
      if (file_exists(asset_tag(MC_JS, $route_asset, array(MCP_OR => MCI_RWBU)))) {
        $html .= asset_tag(MC_JS, $route_asset);
        $exit_debug .= $debug ? 'ok' : '';
      } else
        $exit_debug .= $debug ? 'fail' : '';
      if (file_exists(asset_tag(MC_CSS, $route_asset, array(MCP_OR => MCI_RWBU))))
        $html .= asset_tag(MC_CSS, $route_asset);
      if (file_exists(asset_tag(MC_LESS, $route_asset, array(MCP_OR => MCI_RWBU))))
        $html .= asset_tag(MC_LESS, $route_asset);
    }

    $ci = & get_instance();
    $ci->session->set_userdata('console', $exit_debug);

    if ($only_return)
      return $html;
    else
      echo $html;
  }

}

if (!function_exists('am')) {

  /**
   * AM: Automatic Mode
   * Genera de manera simple un arreglo que cumple un patron en sus rutas.
   * 
   * @param array $elements Es un arreglo en formato AM (Automatic Mode) el cual sera transformado en un array de string
   * siguiendo los patrones con base en su formato. Por ejemplo:
   * 
   * array(
   *   'ruta/comun/para/nuestro/ejemplo' => array(
   *     'elemento0',
   *     'elemento1' => array(
   *       'sub_elemento1_1',
   *       'sub_elemento1_2'
   *     ),
   *     'elemento2',
   *     'elemento3' => array(
   *       'sub_elemento3_1',
   *       'sub_elemento3_2',
   *       'sub_elemento3_2' => array(
   *         'sub_elemento_3_1_1',
   *         'sub_elemento_3_1_2'
   *       ),
   *       'sub_elemento3_3'
   *     )
   *   )
   * )
   * 
   * Sera transformado en:
   * 
   * array(
   *   'ruta/comun/para/nuestro/ejemplo/elemento1/sub_elemento1_2',
   *   'ruta/comun/para/nuestro/ejemplo/elemento2',
   *   'ruta/comun/para/nuestro/ejemplo/elemento3/sub_elemento3_1',
   *   'ruta/comun/para/nuestro/ejemplo/elemento3/sub_elemento3_2',
   *   'ruta/comun/para/nuestro/ejemplo/elemento3/sub_elemento3_2/sub_elemento_3_1_1',
   *   'ruta/comun/para/nuestro/ejemplo/elemento3/sub_elemento3_2/sub_elemento_3_1_2',
   *   'ruta/comun/para/nuestro/ejemplo/elemento3/sub_elemento3_3'
   * )
   * 
   * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 29/12/2014
   */
  function am($elements, $route = '', $separator = '/', $start = true) {
    $return_routes = array();
    foreach ($elements as $pattern => $routes) {
      if (isset($routes)) {
        if (gettype($routes) == "string")
          if (gettype($pattern) == "string")
            $return_routes[] = $start ?
                $route . $pattern . $separator . $routes :
                $route . $separator . $pattern . $separator . $routes;
          else {
            $return_routes[] = $start ?
                $route . $routes :
                $route . $separator . $routes;
          }
        if (gettype($routes) == "array") {
          $temp_route = $start ? $route . $pattern : $route . $separator . $pattern;
          $temp = am($routes, $temp_route, $separator, FALSE);
          foreach ($temp as $value)
            $return_routes[] = $value;
        }
      } else
        $return_routes[] = $start ?
            $route . $pattern :
            $route . $separator . $pattern;
    }
    return $return_routes;
  }

}