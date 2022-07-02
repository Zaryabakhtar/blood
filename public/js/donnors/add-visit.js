// Class definition
var KTFormWidgets = function () {
    // Private functions
    var validator;
    var formId = $( "#add_new_donnor_visit" )
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "");
    var initValidation = function () {
        validator = formId.validate({
            // define validation rules
            rules: {
                visit_date: {
                    required: true,
                },
                visit_donnors:{
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
                    location.reload();
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
        $("#visit_donnors").val('').trigger('change');
    }
    
    $(document).on('change' , '#visit_donnors',function(e){
        var thix = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: DONOR_DETAIL_URL + '/' + thix.val(),
            method: "POST",
            success: function(response){
                var details = response.data.donnorDetails;
                var html = '';
                var count = 1;
                details.forEach(item => {
                    html += '<div class="kt-timeline-v2__item mb-1">'+
                    '<span class="kt-timeline-v2__item-time">'+ count++ +'</span>'+
                    '<div class="kt-timeline-v2__item-cricle">'+
                    '<i class="fa fa-genderless kt-font-danger"></i>'+
                    '</div>'+
                    '<div class="kt-timeline-v2__item-text kt-timeline-v2__item-text--bold kt-padding-top-5">'+item.visit_date +' ('+ item.visit_ago +') <br/>'+ nullOrEmpty(item.visit_note) +'</div>'+
                    '</div>';
                });
                $('#donnor_history_container').removeClass('d-none');
                $('#donnor_timeline').html(html);
            },
            error:function(response){
                toastr.error("Something went wrong!");
            }
        });
    });

    return {
        // public functions
        init: function() {
            initValidation();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormWidgets.init();
});
