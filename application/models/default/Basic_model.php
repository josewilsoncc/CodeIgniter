<?php

/**
 * Brinda funcionalidades básicas, de las cuales carecen sistemas como informix.
 * 
 * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
 * @date 12/12/2014
 */
class Basic_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  /**
   * Esta función sirve para simular un limit en sistemas que carecen de el como informix en sus antigüas versiones
   * 
   * @param string $tables Es la tabla o tablas de las cuales se desea consultar.
   * 
   * @param int $start indica el inidice de partida del limit o elemento inicial
   * 
   * @param int $end indica el indice de finalización del limit o elemento final
   * 
   * ejemplo si $start = 10 y $end = 30, se listaran los elementos de 10 a 30.
   * 
   * @param string $id Es el nombre del campo que cumple el rol de id en la tabla, este campo sera considerado el
   * criterio para ordenar por defecto, si no se especifica ninguno en el parametro opcional 'order_by'.
   * 
   * @param array $params Son los parametros como:
   * 
   * string <b>$select</b> contiene todos los campos de la tabla a seleccionar separados por coma y espacios.
   * 
   * array <b>$where</b> contiene todos las condiciones que se deben de cumplir para un inicio de sesión exitoso.
   * Ejemplo:
   * 
   * array(
   *  'estado'=>'A',
   *  'codusu'=>$username
   *  'contraseña'=>$password
   * )
   * 
   * boolean <b>'unique'</b> Indica si los calculos deben de realizarse sobre valores unicos, false por defecto.
   * 
   * string <b>'database'</b> Indica la conexión de la base de datos a utilizar, 'default' por defecto.
   * 
   * string <b>'order_by'</b> Indica el criterio de orden, si no se especifica se ordenara por el campo indicado como id.
   * 
   * boolean <b>'asc'</b> Indica si consulta a realizar es ascendente (ASC) o desendente (DESC), TRUE por defecto.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @autor Estefania Alzate Daza, teflon28799@gmail.com
   * @date 2014/12/30
   */
  public function limit($tables, $start, $end, $id, $params) {

    $end = $end <= $start ? ($start + $end) - 1 : $end - 1;

    $select = isset($params['select']) ? $params['select'] : '*';
    $where = isset($params['where']) ? $params['where'] : '*';
    $unique = isset($params['unique']) && $params['unique'] ? 'unique' : '';
    $database = isset($params['database']) ? $params['database'] : 'default';
    $order_by = isset($params['order_by']) ? $params['order_by'] : $id;
    $asc = isset($params['asc']) ? $params['asc'] : TRUE;

    $this->load->database($database);

    $this->db->select('count(' . $unique . ' ' . $id . ') as total');
    $this->db->where($where);
    $this->db->from($tables);
    $query = $this->db->get();
    $total = $query->row();
    $total = $total->total;

    if ($total < MC_MNOR) {
      $i = 0;
      $query_return = array();

      $surpassed_half = $start >= ($total / 2);

      $end++;

      $first = !$surpassed_half ? $end : ($total - $start);
      $this->db->select('first ' . $first . ' ' . $select);
      $this->db->where($where);
      $this->db->from($tables);

      $this->db->order_by($order_by, $surpassed_half ?
              ($asc ? 'DESC' : 'ASC') :
              ($asc ? 'ASC' : 'DESC')
      );

      $query = $this->db->get();

      if ($surpassed_half) {
        $temp_start = $total - $end;
        $end = $total - $start;
        $start = $temp_start;
      }

      foreach ($query->result() as $row) {
        if ($i >= $start) {
          $temp = $row;
          $temp->index = !$surpassed_half ? $i : $total - ($i + 1);
          $query_return[] = $temp;
        }
        $i++;
        if ($i >= $end)
          break;
      }

      if ($surpassed_half)
        $query_return = array_reverse($query_return);

      return $query_return;
    } else
      return false;
  }

  /**
   * Permite obtener el total de tuplas bajo un criterio.
   * 
   * @param string $tables Son las tablas sobre las que se realiza la consulta
   * 
   * @param array $params Son los parametros como:
   * 
   * array <b>$where</b> contiene todos las condiciones que se deben de cumplir. Ejemplo:
   * 
   * array(
   *  'estado'=>'A',
   *  'edad'=>$edad
   * )
   * 
   * boolean <b>$unique</b> Indica si los calculos deben de realizarse sobre valores unicos, false por defecto.
   * 
   * string <b>$database</b> Indica la conexión de la base de datos a utilizar, 'default' por defecto.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 2015/01/05
   */
  public function count($tables, $id, $params) {
    $where = isset($params['where']) ? $params['where'] : '*';
    $unique = isset($params['unique']) && $params['unique'] ? 'unique' : '';
    $database = isset($params['database']) ? $params['database'] : 'default';

    $this->load->database($database);

    $this->db->select('count(' . $unique . ' ' . $id . ') as total');
    $this->db->from($tables);
    $this->db->where($where);
    $query = $this->db->get();
    $total = $query->row();
    return $total->total;
  }

}
