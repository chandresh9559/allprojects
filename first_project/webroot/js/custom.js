$(function(){
    // file for custom js code
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    // Ajax csrf token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });

    // ajax request to save student
    $("#frm-add-student").on("submit", function(){

        var postdata = $("#frm-add-student").serialize();
        $.ajax({
            url: "http://localhost:8765/Students/add_student",
            data: postdata,
            type: "JSON",
            method: "post",
           
            success:function(response){
                
                window.location.href = "http://localhost:8765/Students/list_students";
            }
        });
    });

    // ajax request to update student
    $(document).on("submit", "#frm-edit-student", function(){

        var postdata = $("#frm-edit-student").serialize();
        console.log(postdata);
        $.ajax({
            url: "http://localhost:8765/Students/editStudents",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){
                
                window.location.href = 'http://localhost:8765/Students/list_students'
            }
        });
    });

    // ajax request to delete student
    $(document).on("click", ".btn-delete-student", function(){

        if(confirm("Are you sure want to delete ?")){
           
            var postdata = "student_id=" + $(this).attr("data-id");
          
            $.ajax({
                url: "http://localhost:8765/Students/deleteStudent",
                data: postdata,
                type: "JSON",
                method: "post",
                success:function(response){
                   responseArr =  JSON.parse(response);
                   if(responseArr.status == 1){
                       
                       $('#response').html()
                        // $("#studentRec"+$(this).attr('data-id')).hide();
                        // $('#studentRec'+$(this).attr("data-id")).hide();
                        window.location.href = 'http://localhost:8765/Students/list_students'

                          
                     }

                }
            });
        }
    });
});