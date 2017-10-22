$(function() {
    $('.modal').modal();
    $('select').material_select();
    $('.collapsible').collapsible();
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    
   
    $('#sort').change(function() {
        $('#sort-form').submit(); 
    });

    
});

