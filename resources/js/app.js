require('./bootstrap');
require('bootstrap/dist/js/bootstrap.bundle.min');

require('alpinejs');
require('./fontawesome');

import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'


$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        navigation : true, // Show next and prev buttons

        slideSpeed : 300,
        paginationSpeed : 400,

        items : 1,
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false,
        loop:true
    });

    $("#leaveFeedback").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $('#leaveFeedback')[0].reset();
                $('#successMessage').text(data.message);
                $('#successMessage').show();
            }
        });


    });
});
