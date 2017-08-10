jQuery( document ).ready( function( $ ) {

// Create a sidebar and attach to "hamburger" icon
$('.ui.sidebar')
  .sidebar('attach events', '.toc.item')
;

// Initialize dropdowns
$('.ui.dropdown')
  .dropdown({
    transition: 'drop'
  })
;

// Initialize "popupable" dropdowns
$('.ui.dropdown.popupable')
  .popup({
    transition : 'fade down',
    duration   : 200,
    position   : 'bottom center',
    on         : 'click',
    onHidden   : function() {
      $('.download.popup')
        .find('.grid')
        .hide()
        .show()
      ;
    }
  })
;

// Show a 'Read more' button while hovering featured image on post preview cards
$('.special.cards .image')
  .dimmer({
    on: 'hover'
  })
;

});
