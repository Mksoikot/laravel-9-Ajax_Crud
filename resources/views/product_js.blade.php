<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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
        let name = $('#name').val();
        let price = $('#price').val();
        // console.log(name + price);
        $.ajax({
            url:"{{route('add_product')}}",
            method:'post',
            data:{
                name:name,
                price:price
            },
            success:function(res){
                if(res.status == 'success'){
                    $('#addModal').modal('hide');
                    $('#addProductForm')[0].reset();
                    $('.table').load(location.href+' .table');
                }
            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors,function(index, value){
                    $('.errMsgContainer').append("<span class='text-danger'>"+value+"</span>"+'</br>');
                });
            }
        });
    })
});
</script>
