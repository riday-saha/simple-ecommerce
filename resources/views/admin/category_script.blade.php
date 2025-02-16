<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
        //create category data
        $(document).on('click','.add_category',function(e){
            e.preventDefault();
            let get_cat = $('#catego_name').val();
            console.log(get_cat);

            $.ajax({
                url:"{{route('add.category')}}",
                method:"post",
                data:{
                    get_cat:get_cat,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    if(res.status == 'success'){
                        $('#cat_addModal').modal('hide');
                        $('.cat_addform')[0].reset();
                        $('.table').load(location.href+' .table');

                        Command: toastr["success"]("Category Added Successfully", "Success")
                        toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "1000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                },
                error:function(err){
                    
                    var error = err.responseJSON;
                    $('.error_show').html();
                    $.each(error.errors,function(index,value){
                        $('.error_show').append('<span class = "text-danger">'+ value + '</span>');
                    });
                }
            });
        });

        //show category in update form
        $(document).on('click','.cat_up_btn',function(e){
            e.preventDefault();
            let catgo_name =  $(this).data('cname');
            let catgo_id = $(this).data('cid');

            $('#up_catego_name').val(catgo_name);
            $('#up_catego_id').val(catgo_id);
        });

        //update category
        $(document).on('click','.upc_category',function(e){
            e.preventDefault();

            let up_catgoe = $('#up_catego_name').val();
            let up_catgoe_id = $('#up_catego_id').val();

            console.log(up_catgoe + up_catgoe_id);

            $.ajax({
                url:"{{route('update.category')}}",
                method:"POST",
                data:{
                    up_catgoe:up_catgoe,
                    up_catgoe_id:up_catgoe_id,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    if(res.status == 'success'){
                        $('#cat_upModal').modal('hide');
                        $('.table').load(location.href+' .table')
                    }
                },
                error:function(err){
                    var error = res.responseJSON;

                    $.each(error.errors,function(index,value){
                        $('.up_error_show').append('<span class = "text-danger">'+value+'</span>');
                    });
                }
            });
        });

        //delete category
        $(document).on('click','.dcatid',function(){
            var get_id = $(this).data('dit');

            if(confirm('are you sure?')){
                $.ajax({
                    url:"{{route('delete.category')}}",
                    method:"post",
                    data:{
                        get_id:get_id,
                        _token:$('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        if(res.status ==  'success'){
                            $('.table').load(location.href+' .table');
                        }
                    },
                    error:function(err){
                        var error = err.responseJSON;
                        alert(error);  
                    }
                });
            }
        });
    });
</script>