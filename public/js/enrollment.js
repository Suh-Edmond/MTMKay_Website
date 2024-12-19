$(document).ready(function() {


    $("#enrollmentBtn").on("click", function() {
        $('#success').fadeIn()
        $('.modal').modal('hide');
        $('#success').modal('show');
    });

    $('#closeModal').on('click', function (e){
        $('#enrollmentForm').get(0).reset()

    })

    $("#enrollmentForm").submit(function (e){
        e.preventDefault();
        var $form = $(this);
        var action = $('#enrollmentForm').attr('action');
        var method = $('#enrollmentForm').attr('method');


        $(".btn-text").text("Enrolling new student...");
        $('#submitEnrollment').prop('disabled', true)


        $.ajax({
            url:action,
            type:method,
            data: $form.serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function (response){
                if(response.code === "NEW_ACCOUNT_CREATION"){
                    $('#success_new_account').fadeIn()
                    $('.modal').modal('hide');
                    $('#success_new_account').modal('show');
                }else if(response.code === "ENROLLED") {
                    $('#success_enrolled').fadeIn()
                    $('.modal').modal('hide');
                    $('#success_enrolled').modal('show');
                }else {
                    $('#success_exist_acc').fadeIn()
                    $('.modal').modal('hide');
                    $('#success_exist_acc').modal('show');
                }

                $('#enrollmentForm').get(0).reset()

                $(".btn-text").text("Enroll Now");
                $('#submitEnrollment').prop('disabled', false)
            },
            error:function (error){
                $(".btn-text").text("Enroll Now");
                $('#submitEnrollment').prop('disabled', false)
                // $('#error').fadeIn()
                // $('.modal').modal('hide');
                // $('#error').modal('show');
                console.log(error)
                var response = $.parseJSON(error.responseText);
                $.each(response.errors, function(key, val) {
                    $("#" + key).next().html(val[0]).next().html(val[1]);
                    $("#" + key).next().removeClass('d-none');
                })
            }
        })
    })

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
});


