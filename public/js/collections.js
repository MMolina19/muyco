$(document).ready(function() {
    $('[data-bs-toggle="popover"]').popover();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("a[href='#product-data']").click(function(){
        $('#product-images-link').toggleClass('active');
        $(this).addClass('active');
        $('#product-data').toggleClass('hideDiv');
        $('#product-images').toggleClass('hideDiv');
    });

    $("a[href='#product-images']").click(function(){
        $('#product-data-link').removeClass('active');
        $(this).addClass('active');
        $('#product-images').toggleClass('hideDiv');
        $('#product-data').toggleClass('hideDiv');
    });

    $('#cover').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
          $('#preview-cover-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    /*$(function() {
        // Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr(
                            'src', event.target.result,
                            ).attr(
                                'class', 'w-25',
                            ).attr(
                                'id', 'image-'+i,
                            ).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#images').on('change', function() {
            $('div.images-preview-div').html('');
            previewImages(this, 'div.images-preview-div');
        });
    });*/

    $(".imgAdd").click(function(){
        var count=0;
        alert(count++);
        $(this).closest(".row").find('.imgAdd').before(
            //'<div class="col-sm-2 imgUp" style="postion: relative;">'+
            '<div class="col imgUp" style="postion: relative;">'+
                '<div class="imagePreview"></div>'+
                '<i class="fa fa-times del" style="postion: absolute;"></i>'+
                '<label class="btn btn-primary">Upload'+
                    '<input class="uploadFile img" name="image_path[]" type="file" '+
                        'style="width:0px;height:0px;overflow:hidden;">'+
                '</label>'+
            '</div>');
    });

    $(document).on("click", "i.del" , function() {
          $(this).parent().remove();
    });

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
        }
    });
});
