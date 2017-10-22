$(function() {
    $('.modal').modal();
    $('select').material_select();
    $('.collapsible').collapsible();
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
    
   
    $('#sort').change(function() {
        $('#sort-form').submit(); 
    });

    


    
});

