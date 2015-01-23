<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  /*
   * [view]
   * Muestra la vista de inicio de sesión, si el usuario ya esta logeado
   * lo redirecciona al home.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   */
  
  public function index() {
    if (!is_login())
      $this->load->view('layout', array('content' => 'auth/form_login'));
    else
      redirect('home/index');
  }

  /*
   * [method]
   * Realiza un logeo y redirecciona a la vista pertinente de ser
   * exitoso o fallido.
   * 
   * @date 2014/12/23
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   */

  public function log_in() {
    $this->load->model('default/auth_model');

    /*
     * Reglas de validación por defecto, pueden ser modificadas a su gusto
     */
    $this->form_validation->set_rules('username', 'Usuario', 'required|alpha_numeric|min_length[2]|max_length[150]');
    $this->form_validation->set_rules('password', 'Contraseña', 'required|alpha_numeric_spaces|min_length[5]|max_length[20]');

    //Verificando si las reglas no se cumplen
    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('auth/index');
    } else {
      $username = $this->input->post('username', true);
      $password = $this->input->post('password', true);

      $check_user = $this->auth_model->attempt('usuarios', array(
        'select' => 'cencos, fc_desc_sucursal(cencos) descencos, cedula, pro_personal_nombre(cedula) nombre, codusu',
        'where' => array(
          'estado' => 'A',
          'codusu' => $username
        )
      ));

      /*
       * [QUEMADO]
       * usuario admin ibg, esta quemado pues en el sistema actual
       * de base de datos informix, en ninguna parte se especifican
       * los usuarios admin.
       * 
       * quemado en la linea:
       * 'admin' => trim($check_user->codusu)==='ibg'
       */

      //Verificando logeo informix y existencia en la base de datos
      if ($check_user && $this->ftp_attempt(IP_DATABASE_FABRICA, $username, $password)) {
        $data = array(
          'is_logued_in' => TRUE,
          'cedula' => $check_user->cedula,
          'username' => $check_user->codusu,
          'nombre' => $check_user->nombre,
          'sucursal_id' => $check_user->cencos,
          'sucursal_nombre' => $check_user->descencos,
          'admin' => trim($check_user->codusu) === 'ibg'
        );
        $this->session->set_userdata($data);
        redirect('home/index');
      } else {
        $this->session->set_flashdata('error', 'Error en los datos ingresados');
        redirect('auth/index');
      }
    }
  }

  /*
   * Verifica si el usuario y password son correctos, se usa para sistemas
   * de base de datos como informix.
   * 
   * @return true si es exitoso, false de los contrario.
   * 
   * @date 2014/12/23
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @autor Alvaro Javier Vanegas Ochoa, alvarovanegas18@gmail.com
   */

  private function ftp_attempt($ip, $username, $password) {
    return @ftp_login(@ftp_connect($ip), $username, $password);
  }

  /*
   * [method]
   * Cierra la sesión y redirecciona al index
   * 
   * @date 2014/12/23
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   */

  public function close_session() {
    close_session(array('url_redirect' => 'home/index'));
  }

}
