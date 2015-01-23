<?php

/**
 * Controlador de inicio de sesión en el sistema.
 * 
 * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
 * @date 12/12/2014
 */
class Auth_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database('default');
  }

  /**
   * Esta función sirve para iniciar sesión en el sistema, verificicando
   * a traves de la base de datos si se cumplen las condiciones.
   * 
   * @param $table Es la tabla contra la que se pretende verificar
   * el inicio de sesión.
   * 
   * @param array $params Son los parametros como:
   * 
   * string <b>$select</b> contiene todos los campos de la tabla a
   * seleccionar separados por coma y espacios.
   * 
   * array <b>$where</b> contiene todos las condiciones que se deben
   * de cumplir para un inicio de sesión exitoso. Ejemplo:
   * 
   * array(
   *  'estado'=>'A',
   *  'codusu'=>$username
   *  'contraseña'=>$password
   * )
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @autor Alvaro Javier Vanegas Ochoa, alvarovanegas18@gmail.com
   * @date 12/12/2014
   */
  public function attempt($table, $params) {
    $select = isset($params['select']) ? $params['select'] : '*';
    $where = isset($params['where']) ? $params['where'] : '*';

    $this->db->select($select);
    $this->db->from($table);
    $this->db->where($where);
    $query = $this->db->get();
    if ($query->num_rows() == 1)
      return $query->row();
    else
      return FALSE;
  }

}
