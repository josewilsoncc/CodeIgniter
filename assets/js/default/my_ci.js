$(function() {
  messages_control();
});

/**
 * Gestion los efectos automaticos de los mensajes
 */
function messages_control() {
  $(".show_message").hide();
  $(".show_message").fadeIn(500);
  setInterval(function() {
    $(".auto_hide").hide(1000);
  }, 3500);
}

/**
 * Convierte un porcentaje indicado en pixeles con base en la resolución de la pantalla (ancho, alto).
 * 
 * @param {int} percent Es el porcentaje que se desea convertir a pixeles.
 * 
 * @param {boolean} is_width Indica si la conversion se hace respecto al ancho(true) o alto(false). true por omisión.
 * 
 * @author Jose Wilson Capera Castaño - josewilsoncc@hotmail.com
 * @date 2015/01/06
 */

function percentage_dimension(percent, is_width) {
  is_width = is_width !== undefined ? is_width : true;
  var total = (is_width ? window.innerWidth : window.innerHeight);
  return (percent * total) / 100;
}