/**
 * Script para el Carousel
 * @param {string} class_div Es el nombre de la clase del div que se ocultará y mostrar
 * 
 * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
 * @date 2015/01/07
 */
function my_ci_carousel(class_div) {
  $('.'+class_div).hide();
  $('.show_images').css('cursor', 'pointer');
  $('.show_images').mouseenter(function () {
    $('.'+class_div+':hidden').fadeIn();
  });
  $('.show_images').click(function () {
    $('.'+class_div).fadeToggle();
  });
  $('.div_carusel_hiden').mouseleave(function () {
    $('.'+class_div).fadeOut();
  });
}