$(document).ready(function(){
    $("#contactForm").submit(function (e){
        e.preventDefault();
        var $form = $(this);
        console.log($form)
        var action = $('#contactForm').attr('action');
        var method = $('#contactForm').attr('method');


        $(".btn-text").text("Sending Message...");
        $('#submit_btn').attr('disabled', true)


        $.ajax({
            url:action,
            type:method,
            data: $form.serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function (response){

                $('#success').fadeIn()
                $('.modal').modal('hide');
                $('#success').modal('show');

                $form.resetForm();
                $(".btn-text").text("Send Message");

            },
            error:function (error){
                $('#error').fadeIn()
                $('.modal').modal('hide');
                $('#error').modal('show');
            }
        })
    })
})
