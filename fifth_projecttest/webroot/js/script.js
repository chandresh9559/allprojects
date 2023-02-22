// $(document).ready(function(){
    
//         $("#form").on("submit", function(){

//                 var postdata = $("#form").serialize();
//                 alert(postdata);
//                 $.ajax({
//                     url: "/ajax-add-student",
//                     data: postdata,
//                     type: "JSON",
//                     method: "post",
//                     success:function(response){
                        
//                         window.location.href = '/index'
//                     }
//                 });
//             });
// })


$('select').on('change', function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    
    var data = $(this).val();
    $.ajax({
        url: "http://localhost:8765/users/index",
        data: {'status':data},
        type: "json",
        method: "get",
        success:function(response){
            // code will work in case of json retun from the ajax start here
            // res = JSON.parse(response);
            // var tabel_html = '<table><thead><tr><th>id</th><th>name</th><th>email</th><th>image</th><th>created_at</th><th> Actions</th></tr></thead>';
            // tabel_html += '<tbody>';
            // $.each(res, function (key, val) {
            //         tabel_html += '<tr><td>'+val.id+'</td><td>'+val.name+'</td><td>'+val.email+'</td><td></td><td></td><td class="actions"></td></tr>';
                
            // })
            // tabel_html +='</tbody>';
            // tabel_html +='</table>';
            // $('.table-responsive').html(tabel_html);
             // code will work in case of json retun from the ajax end here
             
            // code will work in case cakephp element render start here \
            $('.table-responsive').html(response);
            // code will work in case cakephp element render end here 
        }
    });
});

// $(document).ready(function(){
//     $("#form").validate({
//         rules:{
            
//             name: "required",
//             email: {
//                 required:true,
//                 email:true,
//             },
//             phone: {
//                 required:true,
//                 minlength:10,
//                 maxlength:12,
//             },
//             password: {
//                 required:true,
//                 minlength:5,
               
//             },
//             Confirm_password: {
//                 required:true,
//                 minlength:5,
//                 equalTo:"#password",
//             },
//             gender:"required",
//             image:"required",
           
//         },
//         messages:{
             
//             name:"first name is required",
//             email:{
//                 required:"Email must be required",
//                 email:"please enter a valid email",
//             },
//             profilephone:{
//                 required:"phone number is required",
//                 minlength:"Phone number must be within 10 -12 digit",
//                 maxlength:"Phone number must be within 10 -12 digit",
//             },
//             gender:"select your gender",
//             image:"select your image",
//             password:{
//                 required:"password must be required",
//                 minlength:"password must be 5 characters",
//             },
//             Confirm_password:{
//                 required:"Confirm password must be required",
//                 minlength:"Confirm password must be 5 characters",
//                 equalTo:"Confirm password does not match",
//             },
//         }
//     });
//  });


        // },submitHandler: function (form) {
           
        //     var form_Data = $("#form").serialize();
        //     alert(form_Data);
        //     die;  
        //     $.ajax({
        //         url: "register.php",
        //         type: "POST",
        //         data: form_Data,
        //         success: function(response){
                //     if(response == 'fname'){
                //         $("#fname_error").html("please enter first name");
                //         return  false;
                //     }
                //     if(response == 'lname'){
                //         $("#lname_error").html("please enter last name");
                //         return  false;
                //     }
                //     if(response == 'email'){
                //         $("#email_error").html("please enter your email");
                //         return  false;
                //     }
                //     if(response == 'phone'){
                //         $("#phone_error").html("please enter your phone number");
                //         return  false;
                //     }
                //     if(response == 'pass'){
                //         $("#pass_error").html("please enter password");
                //         return  false;
                //     }
                //     if(response == 'cpass'){
                //         $("#cpass_error").html("please enter confirm password");
                //         return  false;
                //     }
                //     if(response == 'emailerror'){
                //         $("#email_error").html("Email is already exist");
                //         return  false;
                //     }
                //     if(response =='success'){
                               
                //         alert("you are registered successfully");
                //         window.location.href = "login.php";
                //         return  false;
                //     }
                //     else{

                //         alert("Rgistration Failed");
                //         return  false;
                //     }


                            
            //     }
            // });
                
        // }   
        
//   });
//   // for hide error  
//   $('input[name=first_name]').keyup(function () {
//     $('#fname_error').html("");
//   }); 
//   $('input[name=last_name]').keyup(function () {
//     $('#lname_error').html("");
//   }); 
//   $('input[name=email]').keyup(function () {
//     $('#email_error').html("");
//   }); 
//   $('input[name=phone]').keyup(function () {
//     $('#phone_error').html("");
//   }); 
//   $('input[name=pass]').keyup(function () {
//     $('#pass_error').html("");
//   }); 
//   $('input[name=cpass]').keyup(function () {
//     $('#cpass_error').html("");
//   }); 
//   $('input[name=email]').keyup(function () {
//     $('#login_error').html("");
//   }); 

  // for form update
//    $("#update_form").validate({
//         rules:{
            
//             first_name: "required",
//             last_name: "required",
//             email: {
//                 required:true,
//                 email:true,
//             },
//             phone: {
//                 required:true,
//                 minlength:10,
//                 maxlength:12,
//             },
           
//             gender:"required",
           
//         },
//         messages:{
             
//             first_name:"first name is required",
//             last_name:"last name is required",
//             email:{
//                 required:"Email must be required",
//                 email:"please enter a valid email",
//             },
//             phone:{
//                 required:"phone number is required",
//                 minlength:"Phone number must be within 10 -12 digit",
//                 maxlength:"Phone number must be within 10 -12 digit",
//             },
//             gender:"select your gender",

//         },submitHandler: function (form) {
           
//             var update_Data = $("#update_form").serialize();
//             $.ajax({
//                 type: 'POST',
//                 data: update_Data,
//                 url: "update_process.php",
//                 success: function (response) {
                   
//                     if(response =='emailerror'){
//                         $("#email_error").html("Email is already exist");
//                     }
//                     if(response =='updated'){
//                         alert("Data updated successfully");
//                         window.location.href = "userlist.php";
                        
//                     }else{
//                         alert("data updation failed");
//                     }
//                 }   
//             });
                
//         }    
//     });
//    $("#send_otp").validate({
//         rules:{
        
//             email: {
//                 required:true,
//                 email:true,
//             },
           
           
//         },
//         messages:{
             
//             email:{
//                 required:"Email must be required",
//                 email:"please enter a valid email",
//             },

//         },submitHandler: function (form) {
           
//             var send_otp = $("#send_otp").serialize();
       
//             $.ajax({
//                 type: 'POST',
//                 data: send_otp,
//                 url: "send_otp.php",
//                 success: function (response) {
                   
//                   if(response == 'success'){
//                     alert("Email send successfully");
//                     window.location.href="login.php";
//                   }
//                 }   
//             });
                
//         }    
//     });
//    $("#reset_pass").validate({
//         rules:{
        
//             email: {
//                 required:true,
//                 email:true,
//             },
           
           
//         },
//         messages:{
             
//             email:{
//                 required:"Email must be required",
//                 email:"please enter a valid email",
//             },

//         },submitHandler: function (form) {
           
//             var send_otp = $("#reset_pass").serialize();
       
//             $.ajax({
//                 type: 'POST',
//                 data: send_otp,
//                 url: "check_otp.php",
//                 success: function (response) {
                   
//                   if(response == 'success'){
//                     alert("OTP verified");
//                      window.location.href="reset_password.php"
//                   }
//                   else{
//                     alert("OTP verification failed!");
//                   }
//                 }   
//             });
                
//         }    
//     });
//    $("#set_npass").validate({
//         rules:{
        
//             email: {
//                 required:true,
//                 email:true,
//             },
           
           
//         },
//         messages:{
             
//             email:{
//                 required:"Email must be required",
//                 email:"please enter a valid email",
//             },

//         },submitHandler: function (form) {
           
//             var set_data = $("#set_npass").serialize();
//             alert(set_data)
//             $.ajax({
//                 type: 'POST',
//                 data: set_data,
//                 url: "set_pass.php",
//                 success: function (response) {
                   
//                   if(response == 'success'){
//                     alert("Password Changed Successfully");
//                      window.location.href="login.php"
//                   }
//                   else{
//                     alert("Password Reset Failed!");
//                   }
//                 }   
//             });
                
//         }    
//     });
//     $('a[name="delete"]').click(function(){
//         var user_id = $(this).attr("id");
       
//         $.ajax({
//           url:"delete.php",
//           method:"POST",
//           data:user_id,
//           success:function(data)
//           {
//            alert(data);
           
//           }
//         });
        
    
//     });
   
// });


