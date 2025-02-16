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
        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            
            let formData = new FormData();
            formData.append('pro_names',$('#pro_name').val());
            formData.append('pro_price',$('#pro_price').val());
            formData.append('pro_discount',$('#pro_discount').val());
            formData.append('pro_img',$('#pro_img')[0].files[0]);
            formData.append('pro_catego', $('select[name="pro_catego"]').val());
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url:"{{route('add.product')}}",
                method:"POST",
                data:formData,
                processData: false,
                contentType: false,

                success:function(res){
                    if(res.status == 'success'){
                        $('#pro_addModal').modal('hide');
                        $('.product_add_form')[0].reset();
                        $('.table').load(location.href+' .table');

                        Command: toastr["success"]("Product Added Successfully", "Success")
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
                    var error = err.responseJSON; // Corrected variable
                    $('.error-show').html(''); // Clear previous errors
                    $.each(error.errors,function(index,value){
                        $('.error-show').append('<span class="text-danger d-block">'+value+'</span>');
                    });
                }

            });
        });

        //show data in update form
        $(document).on('click','.pro_up_btn',function(e){
            let up_pname = $(this).data('p_name');
            let up_pprice = $(this).data('p_price');
            let up_pdiscount = $(this).data('p_percent');
            let up_ppimg = $(this).data('p_image');
            let up_pcatgo = $(this).data('p_category');
            let up_pid = $(this).data('p_id');


            $('#uppro_name').val(up_pname);
            $('#uppro_price').val(up_pprice);
            $('#uppro_discount').val(up_pdiscount);
            $('.pre_img').attr('src',up_ppimg);
            $('#uppro_id').val(up_pid);
            $('#options option').each(function(){
                if($(this).val() == up_pcatgo ){
                    $(this).prop('selected',true)
                }else{
                    $(this).prop('selected',false)
                }
            });
        });

        //Update product Data
        $(document).on('click','.update_product',function(e){
            e.preventDefault();

            var update_data = new FormData();
            update_data.append('uppro_id',$('#uppro_id').val());
            update_data.append('uppro_names',$('#uppro_name').val());
            update_data.append('uppro_price',$('#uppro_price').val());
            update_data.append('uppro_discount',$('#uppro_discount').val());
            update_data.append('uppro_img',$('#uppro_img')[0].files[0]);
            update_data.append('uppro_catego',$("select[name='uppro_catego']").val());
            update_data.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url:"{{route('update.product')}}",
                method:"post",
                contentType:false,
                processData:false,
                data:update_data,
                success:function(res){
                    if(res.status == 'success'){
                        $('#pro_upModal').modal('hide');
                        $('.table').load(location.href+' .table');
                    }
                },
                error:function(err){
                    var error = err.responseJSON; // Corrected variable
                    $('.errorup-show').html(''); // Clear previous errors
                    $.each(error.errors,function(index,value){
                        $('.errorup-show').append('<span class="text-danger d-block">'+value+'</span>');
                    });
                }
            });
        });

        //Delete Product
        $(document).on('click','.dprotid',function(e){
            e.preventDefault();

            let pro_did = $(this).data('dpit');
            //alert(pro_did);

            if(confirm('Are You Sure?')){
                $.ajax({
                    url:"{{route('delete.product')}}",
                    method:"POST",
                    data:{
                        pro_did:pro_did,
                        _token:$('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        if(res.status == 'success'){
                            $('.table').load(location.href+' .table');
                        }
                    },
                    error:function(err){
                        let derror = err.responseJSON;
                        alert(derror);
                    }
                });
            }

        });


























    });
</script>