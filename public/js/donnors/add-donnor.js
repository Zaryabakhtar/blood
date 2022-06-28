// Class definition
var KTFormWidgets = function () {
    // Private functions
    var validator;
    var formId = $( "#add_new_donnor_form" )
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "");
    var initValidation = function () {
        validator = formId.validate({
            // define validation rules
            rules: {
                donnor_name: {
                    required: true
                },
                donnor_email: {
                    required: true
                },
                donnor_dob: {
                    required: true
                },
                donnor_phone: {
                    required: true
                },
                donnor_address: {
                    required: true
                },
                donnor_age: {
                    required: true,
                },
                donnor_gender:{
                    required: true,
                    valueNotEquals: "0"
                },
                donnor_blood_group:{
                    required: true,
                    valueNotEquals: "0"
                }

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTo('m_form_1_msg', -200);
            },
            beforeSend: function(form) {

            },
            submitHandler: function (form) {
                $("form").find(":submit").prop('disabled', true);
                //form[0].submit(); // submit the form
                var formData = new FormData(form);
                    ajaxFunc(form,formData);
            }
        });
    }

    var ajaxFunc = function (form,formData){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url         : form.action,
            type        : form.method,
            dataType	: 'json',
            data        : formData,
            cache       : false,
            contentType : false,
            processData : false,
            success: function(response,status) {
                if(response.status == 'success'){
                    toastr.success(response.message);
                    setTimeout(function () {
                        $("form").find(":submit").prop('disabled', false);
                    }, 2000);
                    formClear();
                }else{
                    toastr.error(response.message);
                    setTimeout(function () {
                        $("form").find(":submit").prop('disabled', false);
                    }, 2000);
                }
            },
            error: function(response,status) {
                // console.log(response.responseJSON);
                toastr.error(response.responseJSON.message);
                setTimeout(function () {
                    $("form").find(":submit").prop('disabled', false);
                }, 2000);
            },
        });

    }
    var formClear = function(){
        formId.trigger("reset");
    }
    return {
        // public functions
        init: function() {
            initValidation();
            formClear();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormWidgets.init();
});
