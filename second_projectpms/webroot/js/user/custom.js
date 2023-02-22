// var ck = $.noConflict();
$(document).ready(function(){
    
    $('.button').on('click',function(e){
        e.preventDefault();
        // alert("figu");
        // return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
       
        var formData = $('#form').serialize();
        // alert(formData)
        $.ajax({
            url:'/users/registration',
            data:formData,
            type:'JSON',
            method:'post',
            success: function(response){
                
             alert(response);
             window.location.href = '/users/login'

            }
        })
    });
})