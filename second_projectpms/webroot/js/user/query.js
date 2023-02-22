// var $ = $.noConflict();
$(document).ready(function () {

   
    jQuery.validator.addMethod("regex", function (value, element, param) { return value.match(new RegExp("^" + param + "$")); });
    var ALPHA_REGEX = "[a-zA-Z]*";
    // var Reg1 = '/[A-Z]/';
    // var Reg2 = '/[a-z]/';
    // var Reg3 = '/[0-9]/';
    // var Reg4 = '/[!@#$%^&*_]/';

    jQuery.validator.addMethod(
        'Uppercase',
        function (value) {
            return /[A-Z]/.test(value);
        },
        'Your password must contain at least one Uppercase Character.'
    );
    jQuery.validator.addMethod(
        'Lowercase',
        function (value) {
            return /[a-z]/.test(value);
        },
        'Your password must contain at least one Lowercase Character.'
    );
    jQuery.validator.addMethod(
        'Specialcharacter',
        function (value) {
            return /[!@#$%^&*()_-]/.test(value);
        },
        'Your password must contain at least one Special Character.'
    );
    jQuery.validator.addMethod(
        'Onedigit',
        function (value) {
            return /[0-9]/.test(value);
        },
        'Your password must contain at least one digit.'
    );



    $('#form').validate({
        rules: {
            email: {
                required: true,

            },
            'user_profile[first_name]': {
                required: true,
                minlength: 3,
                regex: ALPHA_REGEX,
            },
            'user_profile[last_name]': {
                required: true,
                minlength: 3,
                regex: ALPHA_REGEX,
            },
            email: {
                required: true,
            },
            'user_profile[contact]': {
                required: true,
                digits: true,
                maxlength: 12,
                minlength: 10,
            },
            'user_profile[address]': {
                required: true,
                minlength: 3,

            },


            image:
            {
                required: true,

            },

            password: {

                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,


            },
            Confirm_password: {

                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,
                equalTo: "#password"


            },
            product_title: {
                required: true,
            },
            product_description: {
                required: true,
            },
            product_category: {
                required: true,
            },
            product_description: {
                required: true,
            },
            product_image: {
                required: true,
            },
            product_tags: {
                required: true,
            },
            category_id: {
                required: true,
            }



        },

        messages: {
            email: {
                required: "Email required"

            },
            'user_profile[first_name]':
            {
                required: "**Please enter First Name**",
                minlength: "**Minimum length of Firstname should be 3**",
                regex: "**Please enter characters only**",


            },
            'user_profile[last_name]':
            {
                required: "**Please enter Last Name**",
                minlength: "**Minimum length of Lastname should be 3**",
                regex: "**Please enter characters only**",


            },
            email: "**Please enter Email-id including . and @**",

            'user_profile[contact]': {
                required: "**Please enter Phone Number**",
                digits: "**Please enter Digits Only**",
                maxlength: "**Maximum length of Phone Number should be 12 digits**",
                minlength: "**Minimum length of Phone Number should be 10 digits**",
            },
            'user_profile[address]': {
                required: "**Please enter your Address**",
                minlength: "**Minimum length of Address should be 3**",

            },

            image: {
                required: "**Please select an Image**",

            },
            password:
            {
                required: "**Please enter Password**",
                maxlength: "**Maximum length of Password should be 18 digits**",
                minlength: "**Minimum length of Password should be 8 digits**",
            },
            Confirm_password:
            {
                required: "**Please enter Confirm Password**",
                maxlength: "**Maximum length of Password should be 18 digits**",
                minlength: "**Minimum length of Password should be 8 digits**",
                equalTo: "Confirm Password does not match",
            },

            product_title: {
                required: "**Please enter Product Title",
            },
            product_description: {
                required: "Please enter Product Description",
            },
            product_category: {
                required: "Please enter Product Category",
            },
            product_image: {
                required: "Please Select Image",
            },
            product_tags: {
                required: "Please enter Product Tags",
            },
            category_id: {
                required: "Please select category",
            },

        },submitHandler: function (form) {

        
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                }
            });
            
            var data = new FormData(this);
            $.ajax({
                url: "http://localhost:8765/Users/registration",
                data: data,
                type: "JSON",
                method: "post",
                
                success:function(response){
                    var data = JSON.parse(response);
                    var status = data['status'];
                    if(status == '1'){
                        // $('#success').html('');
                        $('#success').append(data['message']);
                    
                        window.location.href = 'http://localhost:8765/users/login';
                    }else if(status == '0'){
                        // $('#email-error').html('');
                        // $('#email-error').show();
                        $('#email_error').append(data['message']);
                    
                    }
                }
            });
    
    }
    })
});
