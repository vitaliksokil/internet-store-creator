require('./bootstrap');

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

});
