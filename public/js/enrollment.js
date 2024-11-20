$(document).ready(function() {


    $("#enrollmentBtn").on("click", function() {
        $('#success').fadeIn()
        $('.modal').modal('hide');
        $('#success').modal('show');
    });

    $("#enrollmentForm").submit(function (e){
        e.preventDefault();
        var $form = $(this);
        var action = $('#enrollmentForm').attr('action');
        var method = $('#enrollmentForm').attr('method');


        $(".btn-text").text("Enrolling new student...");
        $('#submitEnrollment').attr('disabled', true)


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

                $form.resetForm();
                $(".btn-text").text("Enroll Now");

            },
            error:function (error){
                $('#error').fadeIn()
                $('.modal').modal('hide');
                $('#error').modal('show');
            }
        })
    })
});
