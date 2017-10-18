$(function() {
    $('.modal').modal();
    $('select').material_select();
    $('.collapsible').collapsible();
   
    $('#sort').change(function() {
        $('#sort-form').submit(); 
    });

    
});

