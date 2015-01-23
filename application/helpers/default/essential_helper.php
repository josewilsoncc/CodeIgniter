<?php

if (!function_exists('base_url_images')) {

  /**
   *
   * Genera la url base de las imagenes siguiendo el estandar
   * 
   * @params array $params Son los parametros opcionales como:
   * 
   * boolean <b>$only_return</b> si es true el resultado sera retornado en lugar de ser impreso con un echo de manera
   * automatica.
   * 
   * @return url base para uso de imagenes
   */
  function base_url_images($params = '') {
    $only_return = isset($params[MCP_OR]) ? $params[MCP_OR] : false;
    if ($only_return)
      return base_url() . 'assets/images/';
    else
      echo base_url() . 'assets/images/';
  }

}

if (!function_exists('validate_date')) {

  /**
   * Verifica si una fecha coincide con un formato dado
   * @param string $date fecha a verificar.
   * @param string $formato fortamto que deberia cumplir la fecha. Ejemplo 'Y-m-d H:i:s'.
   * ejemplos de uso y retornos:
   * 
   * validateDate('2012-02-28 12:12:12'); # true
   * 
   * validateDate('2012-02-30 12:12:12'); # false
   * 
   * validateDate('2012-02-28', 'Y-m-d'); # true
   * 
   * validateDate('28/02/2012', 'd/m/Y'); # true
   * 
   * validateDate('30/02/2012', 'd/m/Y'); # false
   * 
   * validateDate('14:50', 'H:i'); # true
   * 
   * validateDate('14:77', 'H:i'); # false
   * 
   * validateDate(14, 'H')); # true
   * 
   * validateDate('14', 'H'); # true
   * 
   * validateDate('2012-02-28T12:12:12+02:00', 'Y-m-d\TH:i:sP'); # true
   * 
   * validateDate('2012-02-28T12:12:12+02:00', DateTime::ATOM); # true
   * 
   * validateDate('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O')); # true
   * 
   * validateDate('Tue, 28 Feb 2012 12:12:12 +0200', DateTime::RSS); # true
   * 
   * validateDate('Tue, 27 Feb 2012 12:12:12 +0200', DateTime::RSS); # false
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 2014/11/26
   * @note Requiere los CSS bootstrap y text_style.
   */
  function validate_date($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
  }

}

if (!function_exists('generate_random_string')) {

  /**
   * Genera una String aleatoria con el tamaña y los caracteres espeficicados
   * 
   * @param int $length Es el tamaño del string a generar, por defecto es 10
   * 
   * @param string $characters Son los caracteres que puede contener el string generado, por defecto numeros, letras
   * mayusculas y minusculas.
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 2014/11/26
   */
  function generate_random_string($length = 10, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $randomString = '';
    for ($i = 0; $i < $length; $i++)
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    return $randomString;
  }

}

if (!function_exists('unserialized')) {

  /**
   * Obtiene el valor del elemento indicado de un form serializado enviado por ajax usando Jquery.
   * 
   * @param array $data Es el formulario serializado enviado por ajax.
   * @param string $searched_key Es el nombre del elemento en el formulario del que se desea obtener el valor.
   * @return string El valor del elemento indicado, false si este no existe.
   * 
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 2014/12/10
   */
  function unserialized($data, $searched_key) {
    for ($i = 0; $i < count($data); $i++)
      if ($data[$i]['name'] == $searched_key)
        return $data[$i]['value'];
    return false;
  }

}

if (!function_exists('is_login')) {

  /**
   * Verifica si un usuario esta logeado o no.
   * @return boolean Retorna TRUE si el usuario esta logeado en el sistema, false de lo contrario.
   * @author Jose Wilson Capera Castaño <josewilsoncc@gmail.com>
   * @date 2014/12/24
   */
  function is_login() {
    $ci = & get_instance();
    return $ci->session->userdata('is_logued_in');
  }

}

if (!function_exists('is_admin')) {

  /**
   * Verifica si un usuario es administrador o no.
   * @return boolean Retorna TRUE si el usuario es administrador del sistema, false de lo contrario.
   * @author Jose Wilson Capera Castaño <josewilsoncc@gmail.com>
   * @date 2014/12/24
   */
  function is_admin() {
    $ci = & get_instance();
    return $ci->session->userdata('admin');
  }

}

if (!function_exists('only_admin')) {

  /**
   * Verifica si un usuario es administrador y si no lo es, redirecciona al usuario a la raiz del proyecto.
   * @author Jose Wilson Capera Castaño josewilsoncc@gmail.com
   * @date 2014/12/24
   */
  function only_admin() {
    if (!is_admin())
      redirect(base_url());
  }

}

if (!function_exists('close_session')) {

  /**
   * Cierra sesión y redirecciona segun los parametros
   * 
   * @param array $params Es un arreglo de parametros opcionales como:
   * 
   * boolean <b>$redirect</b> Indica si se redirecciona o no, TRUE por defecto.
   * 
   * string <b>$url_redirect</b> Es la url a redireccionar, base_url por defecto.
   * 
   * @autor Alvaro Javier Vanegas Ochoa, alvarovanegas18@gmail.com
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 2014/12/24
   */
  function close_session($params = '') {
    $redirect = isset($params['redirect']) ? $params['redirect'] : true;
    $url_redirect = isset($params['url_redirect']) ? base_url() . $params['url_redirect'] : base_url();
    $ci = & get_instance();
    $ci->session->sess_destroy();
    if ($redirect)
      redirect($url_redirect);
  }

}
?>