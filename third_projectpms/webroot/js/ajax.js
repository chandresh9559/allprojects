$(document).ready(function () {
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    $(document).on("click", ".btn-delete", function(){

            var postdata =$(this).attr("data-id");
            var status_id =$(this).attr("status-id");
        //    alert(postdata);
        //    return false;
            swal({
                closeOnClickOutside: false,
                icon: "warning",
                title: 'Do you want to delete this user?',
                text: 'This action can not be undo',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete",
                closeOnConfirm: false
            },function () {
                $.ajax({
                    url: "http://localhost:8765/admin/users/delete",
                    data: {'user_id':postdata,'delete_status':status_id},
                    type: "JSON",
                    method: "get",
                    success:function(response){
                    responseArr =  JSON.parse(response);
                    
                        if(responseArr.status == 1){
                        
                            $("#user"+postdata).hide();
                            
                                // $('#studentRec'+$(this).attr("data-id")).hide();
                                
                        }
                    }
                }).done(function(data) {
                    swal("Deleted!", "Data successfully Deleted!", "success");
                  })
                  .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                  });
            }
        );
    });

    // delete product
    $(document).on("click", ".delete-product", function(){

           
            var postdata =$(this).attr("data-id");
            var delete_product =$(this).attr("status-id");
            // alert(delete_product);
            // return false;
            swal({
                closeOnClickOutside: false,
                icon: "warning",
                title: 'Do you want to delete this product?',
                text: 'This action can not be undo',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete",
                closeOnConfirm: false
            },function () {
          
                $.ajax({
                    url: "http://localhost:8765/admin/products/delete-product",
                    data: {'product_id':postdata,'delete_status':delete_product},
                    type: "JSON",
                    method: "get",
                    success:function(response){
                       var responseArr =  JSON.parse(response);
                        if(responseArr.status == 1){
                        
                            $("#product"+postdata).hide();
                            
                        }
                    }
                }).done(function(data) {
                    swal("Deleted!", "Data successfully Deleted!", "success");
                  })
                  .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                  });
            }
        );
    });

    // delete category
    
    $(document).on("click", ".delete-category", function(){

        // if(confirm("Are you sure want to delete ?")){
           
            var postdata =$(this).attr("data-id");
            var status_id =$(this).attr("status-id");
            // alert(status_id);
            // return false;
            
            swal({
                closeOnClickOutside: false,
                icon: "warning",
                title: 'Do you want to delete this category?',
                text: 'This action can not be undo',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete",
                closeOnConfirm: false
              },function () {
                    $.ajax({
                        url: "http://localhost:8765/admin/product-categories/delete-category",
                        data: {'category_id':postdata,'delete_status':status_id},
                        type: "JSON",
                        method: "get",
                        success:function(response){
                        var responseArr =  JSON.parse(response);
                        if(responseArr.status == 1){
                          
                            $("#category"+postdata).hide();
                            // $('#studentRec'+$(this).attr("data-id")).hide();
                        }
                        }
                    }).done(function(data) {
                        swal("Deleted!", "Data successfully Deleted!", "success");
                      })
                      .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                      });
                }
            )
    });

    //search user via status

    $('.status').on('change', function() {
        var data = $(this).val();
  
        $.ajax({
            url: "http://localhost:8765/admin/users/user-list",
            data: {'status':data},
            type: "json",
            method: "get",
            success:function(response){
                $('.table-responsive').html(response);
            }
        });
    });

    //search category via status

    $('.status1').on('change', function() {
        var data = $(this).val();
        
        $.ajax({
            url: "http://localhost:8765/admin/product-categories/category-list",
            data: {'status1':data},
            type: "json",
            method: "get",
            success:function(response){
                $('.table-responsive').html(response);
            }
        });
    });

    //search product via status

    $('.status2').on('change', function() {
        var data = $(this).val();
  
        $.ajax({
            url: "http://localhost:8765/admin/products/product-list",
            data: {'status2':data},
            type: "json",
            method: "get",
            success:function(response){
                $('.table-responsive').html(response);
            }
        });
    });

    // rate to the product
    var star = 1;
    $('.star').click(function () {
        star = $(this).val();
        // alert(star);
        
    });
    $('#submitpost').on('click',function(){
        var value = $('.cinput').val();
        var productid = $('.productid').val();
        var userid = $('.userid').val();
        var username = $('.uname').val();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        //     }
        // });
        // alert(username);
        // return false;

        $.ajax({
            url: "http://localhost:8765/admin/products/view-product",

            data: {
                'user_id':userid,
                'user_name':username,
                'product_id':productid,
                'rate_value':star,
                'comment':value,
            },
            method: "post",
            type: "JSON",
            success:function(response){
                // alert(response);
                $('.related').html(response);
            }
        });


    });

    // $('.btn-view').on('click', function () {
    //     var user_id = $(this).data('data-id');
    //     alert(user_id);

    //     $.ajax({
    //         url: "http://localhost:8765/admin/users/user-list",
    //         data: { 'id': user_id },
    //         type: "JSON",
    //         method: "get",
    //         success: function (response) {
    //             car = $.parseJSON(response);
    //             $('#modelHeading').html("Edit Product");
    //             $('#ajaxModelEdit').modal('show');
    //             $('#iddd').val(car['id']);
    //             $('#image').val(car['image']);
    //             $('#company').val(car['company']);
    //             $('#brand').val(car['brand']);
    //             $('#model').val(car['model']);
    //             $('#make').val(car['make']);
    //             $('#color').val(car['color']);
    //             $('#description').val(car['description']);
    //         }
    //     });
    // });

    // view to user
    $('.btn-view').on('click',function(){
        
        var data = $(this).attr("data-id");
        $.ajax({
            url: "/admin/users/getView",
            data: {'id':data},
            type: "JSON",
            method: "get",
            success:function(response){
                user = $.parseJSON(response);
                var image = user['image'];  
                document.querySelector('#user_img').setAttribute('src','/img/'+image);
                $('#email').val(user['email']);
                $('#user-profile-first-name').val(user['user_profile']['first_name']);
                $('#user-profile-last-name').val(user['user_profile']['last_name']);
                $('#user-profile-contact').val(user['user_profile']['contact']);
                $('#user-profile-address').val(user['user_profile']['address']);
                
            }
        });

    });

    //=================== product category area=============================//
    // fetch data of category
    $('.btn-category').on('click',function(){
        
        var data = $(this).attr("data-id");
        $.ajax({
            url: "/admin/product-categories/getCategory",
            data: {'category_id':data},
            type: "JSON",
            method: "get",
            success:function(response){
                category = $.parseJSON(response);
                $('#category-name').val(category['category_name']);
                $('#category-id').val(category['category_id']);
               
            }
        });

    });

    // edit category
    $('#edit-category').validate({
        rules: { 

            category_name: {
                required: true,
            }
        },
        messages: {

            category_name: {
                required: "Please enter category name",
            },
            
        },submitHandler:function(){
          
            var form_data = $('#category-name').val();
            var category_id = $('#category-id').val();           
           
            $.ajax({

                url:'/admin/product-categories/edit-category',
                type:'JSON',
                method:'POST',
                data:{'category_name':form_data,'category_id':category_id},
                success:function(response){
                    $('#exampleModal').hide();
                    $('.modal-backdrop').remove();
                    $('#category-list').load('/admin/product-categories/category-list','#category-list');
                //    if(response == 'edited'){
                //     alert('category has been edited');
                //    }else{
                //     alert('failed');
                //    }
                }
            });
        }
    });

    // =====================end product category area==================//

    //=================== product area=============================//
    // fetch data of product
    $('.btn-product').on('click',function(){
        
        var data = $(this).attr("data-id");
       
        $.ajax({
            url: "/admin/products/getProduct",
            data: {'product_id':data},
            type: "JSON",
            method: "get",
            success:function(response){
                product = $.parseJSON(response);
                $('#product-title').val(product['product_title']);
                $('#product-description').val(product['product_description']);
                $('#product-tags').val(product['product_tags']);
                $('#product-id').val(product['id']);
               
            }
        });
        // var jsonString = JSON.stringify(obj);
    });

    // edit product
    $('#edit-product').validate({
        rules: {
            
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
                required: "Please enter category name",
            },

            
        },submitHandler:function(form){
    
            var form_data = new FormData(form);
          
            $.ajax({

                url:'/admin/products/editProduct',
                type:'JSON',
                method:'POST',
                cache: false,
                processData: false,
                contentType: false,
                data:form_data,
                success:function(response){
                    var data = JSON.parse(response);
                    if (data['status'] == 0) {
                        alert(data['message']);
                    } else {
                        $('#edit-product').trigger("reset");
                        $('#exampleModal').modal('hide');
                        // alert('The product has been updated');
                        swal("Good job!", "The product has been updated!", "success");
                        window.location.href = "/admin/products/product-list";
                    }
                    
                }
            });
        }
    });

    // =====================end product category area==================//

    //====================Activate Deactivate category===================//

    $('.category-status').on('click', function(){
        var id = $(this).attr("data-id");
        $.ajax({

            url:'/admin/product-categories/get-status',
            type:'JSON',
            method:'get',
            data:{id:id},
            success:function(response){
                product = $.parseJSON(response);
                var myHtml = "";
                var countp = 0;
               
                $('#category_id').val(product['category_id']);
                $('#category_status').val(product['status']);
                $.each(product, function(k, v) { 
                    if (k == 'products') {
                        $.each($(this), function(index, value) {
                            // console.log(index+value);
                           
                            if (value.status != 0) {
                                countp++;
                                myHtml += "<li><span>" + value.product_title + "</span></li>";
                                // console.log(value['product_title']);
                            }
                        });
                    }
                });

                $("#response").html(myHtml);
                $('#count').html(countp);
            }
        });
    });

     //======== deactivate category and all related products ===========
    $('#change-status').on('click', function() {
       
        var status = $('#category_status').val();
        var id = $('#category_id').val();
        $.ajax({
            url: "/admin/product-categories/deactivate",
            type: "JSON",
            method: "POST",
            data: {
                'id': id,
                'status': status,
            },
            success: function(response) {
                alert(response)
            }
        });
        // return false;
    });
  
})