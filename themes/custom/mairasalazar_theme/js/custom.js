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
    }
  }

  Drupal.behaviors.mairasalazar_theme = {
    attach: function(context, settings) {

      init();

    }
  };

})(jQuery, Drupal);