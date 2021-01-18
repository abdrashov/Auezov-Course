/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace()

  // Graphs
  var ctx = document.getElementById('myChart')

  // Hover message
  $(function () {
    $('[data-tooltip="tooltip"]').tooltip()
  });

  // Copy-Paste block
  $(document).ready(function() {
    $('.createBtn').on('click', function(){
      $(this).before($(".createBlock:last").clone());
    });
  });

  // Delete block
  $(document).on('click', '.deleteBtn', function() {
    $(this).parent().remove();
  });
  
})()


