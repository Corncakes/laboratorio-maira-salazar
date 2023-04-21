/**
 * @file
 * Global utilities.
 *
 */
(function($, Drupal) {

  'use strict';

  var initialized;

  function init() {
    if (!initialized) {
      initialized = true;
      
      var slider = tns({ 
        container: '.main-slider .view-content.row',
        mode: 'carousel',
        controlsPosition: 'bottom',
        gutter: 0,
        items: 1,
        navPosition: 'bottom',
        "mouseDrag": true,
        controlsText: ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
      });

      var aliadosSlider = tns({ 
        container: '.aliados-slider',
        mode: 'carousel',
        autoplay: true,
        loop: true,
        controlsPosition: 'bottom',
        gutter: 20,
        items: 6,
        navPosition: 'bottom',
        mouseDrag: true,
        controlsText: ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
      });
    }
  }

  Drupal.behaviors.mairasalazar_theme = {
    attach: function(context, settings) {

      init();

    }
  };

})(jQuery, Drupal);