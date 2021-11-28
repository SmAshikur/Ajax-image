$(document).ready(function () {
    $('#-edit').hide()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('submit','#updateForm', function (e) {
        e.preventDefault();
       // alert("i am ready");
       var id = $('#id').val()
       //var id= $('#ashik').val();
       alert(id);
       let  UpformData = new FormData($("#updateForm")[0]);
        console.log(UpformData);
        $.ajax({
            type: "POST",
            url: "ajax/"+id,
            data: UpformData,
            contentType: false,
           // contentType: false,
            processData: false,

            success: function (response) {
                fetch_data();
                console.log(response)
            },error:function(err){
                $('#Errname').text(err.responseJSON.errors.name);
                $('#Erraddress').text(err.responseJSON.errors.address);
                $('#Errimage').text(err.responseJSON.errors.image);
                $('#Errmobile').text(err.responseJSON.errors.mobile);
                console.log(err.responseJSON.errors)
            }
        });

    });






    $(document).on('submit','#addForm', function (e) {
        e.preventDefault();
       // alert("i am ready");
        let  formData = new FormData($("#addForm")[0]);

        $.ajax({
            type: "POST",
            url: "ajax",
            data: formData,
            contentType: false,
           // contentType: false,
            processData: false,

            success: function (response) {
                fetch_data();
                console.log(response)
            },error:function(err){
                $('#Errname').text(err.responseJSON.errors.name);
                $('#Erraddress').text(err.responseJSON.errors.address);
                $('#Errimage').text(err.responseJSON.errors.image);
                $('#Errmobile').text(err.responseJSON.errors.mobile);
                console.log(err.responseJSON.errors)
            }
        });

    });
    //get
    $(document).on('click', '.page-link', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
      // alert(page);
        fetch_data(page);
     });
     function fetch_data(page){
        var _token = $("input[name=_token]").val();
        //alert(_token);
        $.ajax({
            type: "POST",
            url: "ajax/get",
            data: {_token:_token,page:page},
            success: function (data) {
                $('#king').html(data);
            }
        });

     }
     //fetch_data(page);
     $(document).on('click','.edt-btn', function () {
        $('#-edit').show()
        $('#-add').hide()
         var id = $(this).val()
        // alert(id);
        $.ajax({
            type: "get",
            url: "ajax/"+id+"/edit",
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response.address)
               $('#name').val(response.name);
               //$('#image').val(response.image);
                $('#address').val(response.address);
                $('#mobile').val(response.mobile);


                $('#id').val(response.id);
                $('#img').html("<img src='images/"+response.image+"' width='50px' height='50px'>");
            }
        });
     });


    $(document).on('click','.del-btn', function (e) {
        e.preventDefault();
        var id= $(this).val()
        $.ajax({
            type: "DELETE",
            url: "ajax/"+id,
            success: function (response) {
                console.log("delete done");
                fetch_data()
            }
        });

    });
});
