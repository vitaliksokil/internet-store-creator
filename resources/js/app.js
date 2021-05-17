require('./bootstrap');
require('bootstrap/dist/js/bootstrap.bundle.min');

require('alpinejs');
require('./fontawesome');

import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'
const Swal = require('sweetalert2')

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
    $(".add-to-shopping-cart[data-disabled='']").each(function(index) {
        $(this).on('click', function (){
            $(this).submit()
        });
        $(this).submit(function(e){
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: true,
                        // timer: 3000
                    });
                    form.find('button').each(function(index){
                        $(this).prop("disabled", true);
                    })
                    form.off('click')

                    var shoppingCartCountBtn = $('#shoppingCartCountBtn span');
                    var count = +shoppingCartCountBtn.text() + 1;
                    shoppingCartCountBtn.text(count)
                },
                error:function (error){
                    var err = JSON.parse(error.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: err.message
                    })
                }
            });

        });
    });

    $(".add-to-wishlist[data-disabled='']").each(function(index) {
        $(this).on('click', function (){
            $(this).submit()
        });
        $(this).submit(function(e){
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');
            console.log(form)
            console.log(url)
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: true,
                        // timer: 3000
                    });
                    form.find('button').each(function(index){
                        $(this).prop("disabled", true);
                    })
                    form.off('click')

                    var wishlistCountBtn = $('#wishlistCountBtn span');
                    var count = +wishlistCountBtn.text() + 1;
                    wishlistCountBtn.text(count)
                },
                error:function (error){
                    var err = JSON.parse(error.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: err.message
                    })
                }
            });

        });
    });

    $( ".product_quantity" ).change(function(e) {
        let count = $(this).val();
        let shoppingCartId = $(this).data('shoppingCartId');
        $('#product_quantity_'+shoppingCartId).submit()
    });


});
