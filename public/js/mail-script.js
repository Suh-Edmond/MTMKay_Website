    // -------   Mail Send ajax

     $(document).ready(function() {
        var form = $('#myForm'); // contact form
        var submit = $('.submit-btn'); // submit button
        var alert = $('.alert-msg'); // alert div for show alert message


        // form submit event
        form.on('submit', function(e) {
            e.preventDefault(); // prevent default form submit

            $.ajax({
                url: '/dashboard/manage-subscribers/add-subscriber', // form action url
                type: 'POST', // form submit method get/post
                dataType: 'json', // request type html/json/xml
                data: form.serialize(), // serialize form data
                beforeSend: function() {
                    alert.fadeOut();
                    submit.html('Subscribing....'); // change submit button text
                    $('#show_subscription_process').css({'display': 'block'})
                },
                success: function(data) {
                    alert.html(data).fadeIn(); // fade in response data
                    form.trigger('reset'); // reset form
                    submit.attr("style", "display: none !important"); // reset submit button text
                    $('#show_subscription_process').css({'display': 'none'})
                    $('#success_subscribe').fadeIn()
                    $('.modal').modal('hide');
                    $('#success_subscribe').modal('show');
                },
                error: function(e) {
                    $('#show_subscription_process').css({'display': 'none'})
                }
            });
        });
    });
