/**
 * Script para el CoverFlow
 * @param {int} index Es el indice de la imagen a mostrar inicialmente.
 * @param {int} density Indica que tantas imagenes seran mostradas a los costados.
 * @param {int} innerOffset Indica la distancia entre las imagenes.
 * @param {float} innerScale Indica el porcentaje de tamaño que adquieren las imagenes de los costados con respecto a la
 * imagen central en porcentaje
 * @param {function} on_confirm Función a llamar cuando se da click a la imagen central.
 * 
 * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
 * @date 2015/01/06
 */
function my_ci_coverflow(index, density, innerOffset, innerScale, on_confirm) {
  if ($.fn.reflect) {
    $('#view-coverflow .cover').reflect();	// only possible in very specific situations
  }

  $('#view-coverflow').coverflow({
    index: index,
    density: density,
    innerOffset: innerOffset,
    innerScale: innerScale,
    confirm: function (event, cover, index) {
      on_confirm(event, cover, index);
    },
    animateStep: function (event, cover, offset, isVisible, isMiddle, sin, cos) {
      if (isVisible) {
        if (isMiddle) {
          $(cover).css({
            'filter': 'none',
            '-webkit-filter': 'none'
          });
        } else {
          var brightness = 1 + Math.abs(sin),
                  contrast = 1 - Math.abs(sin),
                  filter = 'contrast(' + contrast + ') brightness(' + brightness + ')';
          $(cover).css({
            'filter': filter,
            '-webkit-filter': filter
          });
        }
      }
    }
  });
}