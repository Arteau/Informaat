$(function() {
    console.log("working first");
    $('.modal').modal();
    
    $('select').material_select();
    
   
    
    

   $('#sort').change(function() {
        $('#sort-form').submit(); 
    });

    $('.collapsible').collapsible();


});

