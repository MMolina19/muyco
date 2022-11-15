$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before(
            '<div class="flex align-items-center imgUp">'+
            '<i class="fa fa-times del"></i><div class="imagePreview"></div>'+
            '<label class="btn btn-primary"> <i class="bi bi-plus"></i>'+
            '   <input class="uploadFile img" name="image_path[]" type="file" '+
                    'style="width:0px;height:0px;overflow:hidden;">'+
            '</label></div>'
        );
        $('input[name=counter]').val( $('.imgUp').length );
    });

    $(document).on("click", "i.del" , function() {
          $(this).parent().remove();
    });

    $(function() {
        $(document).on("change",".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
                reader.onloadend = function() { // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
      uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                }
                //alert('Image successfully loaded');
            }
        });
    });

/*    $('#upload_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            //url:"{{ route('images.store') }}",
            //method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data) {
                //$('#message').css('display', 'block');
                //$('#message').html(data.message);
                //$('#message').addClass(data.class_name);
                //$('#uploaded_image').html(data.uploaded_image);
            }
        })
    });*/
});
