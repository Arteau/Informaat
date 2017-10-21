$(function() {
    $('.modal').modal();
    $('select').material_select();
    $('.collapsible').collapsible();
    $(".button-collapse").sideNav();
    
   
    $('#sort').change(function() {
        $('#sort-form').submit(); 
    });

    
});

