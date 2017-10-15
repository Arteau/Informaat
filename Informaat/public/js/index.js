$(function() {
    $('#sort').change(function() {
        $('#sort-form').submit(); 
});


// add tags to project

            $('.chips').material_chip();
            $('.chips-initial').material_chip({
            data: [{
                tag: 'Apple',
            }, {
                tag: 'Microsoft',
            }, {
                tag: 'Google',
            }],
            });
            $('.chips-placeholder').material_chip({
            placeholder: 'Enter a tag',
            secondaryPlaceholder: '+Tag',
            });
            $('.chips-autocomplete').material_chip({
            autocompleteOptions: {
                data: {
                'Apple': null,
                'Microsoft': null,
                'Google': null
                },
                limit: Infinity,
                minLength: 1
            }
            });
});