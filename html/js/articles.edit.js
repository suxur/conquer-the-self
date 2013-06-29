// Bootstrap Styled File Inputs
$('.fileupload').fileupload({
    name: 'image-upload'
});

// Ajax Uploader and Crop
(function () {

    var input    = $('#input-upload-00'),
        upload   = $('#btn-upload-00'),
        response = $('#response-00'),
        btnCrop  = $('#btn-crop'),
        img      = $('#img-preview'),
        filename = $('#filename'),
        reader, data = false, file;

    upload.on('click', function (e) {
        e.preventDefault();

        console.log(data);

        if (window.FormData) {
            data = new FormData();
        }

        console.log(data);


        file = input[0].files[0];

        response.html('<div class="progress progress-striped active image-progress">' +
                          '<div class="bar" style="width: 100%;"></div>' +
                      '</div>');

        if (!!file.type.match(/image.*/)) {
            if (window.FileReader) {
                reader = new FileReader();
                reader.readAsDataURL(file);
            }

            data.append('userfile', file);

            $.ajax({
                url: 'upload_crop',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (res) {

                    var json = $.parseJSON(res),
                        msg = json.msg,
                        success = json.success;

                    if (success === 'false') {

                        response.html('<div class="alert alert-error">' +
                                          '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                          '<strong>Oops! </strong>' + msg +
                                      '</div>');
                    }

                    if (success === 'true') {
                        response.html('<div class="alert alert-success">' +
                                          '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                          '<strong>Success! </strong>The image ' + msg + ' has been successfully uploaded!' +
                                      '</div>');

                        filename.attr('value', msg);
                        img.attr('src', 'http://www.conquertheself.com/img/uploads/' + msg).attr('alt', msg);

                        img.Jcrop({
                            minSize: [300, 300],
                            onChange: showCoords,
                            onSelect: showCoords
                        });

                        $('#crop-modal').modal().css({
                            width: '600px',
                            'margin-left': '-300px'
                        });
                    }
                }
            });
        }

        btnCrop.on('click', function (e) {

            e.preventDefault();

            var data = {
                x1:   $('#x1').val(),
                y1:   $('#y1').val(),
                w:    $('#w').val(),
                h:    $('#h').val(),
                file: img.attr('alt')
            };

            $.ajax({
                url: 'crop',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    $('#modal-body').html('<div class="alert alert-success">' +
                                             '<strong>Success!</strong> You have cropped the image ' + data +
                                          '</div>');
                    btnCrop.remove();
                }
            });

        });

        function showCoords(c) {
            $('#x1').val(c.x);
            $('#y1').val(c.y);
            $('#x2').val(c.x2);
            $('#y2').val(c.y2);
            $('#w').val(c.w);
            $('#h').val(c.h);
        }

    });

}());

// Ajax Uploader
function uploadImage() {

    var input = $('#input-upload-01'),
        upload = $('#btn-upload-01'),
        response = $('#response-01'),
        filename = $('#filename-01'),
        reader,
        data,
        file;

    file = input[0].files[0];

    response.html('<div class="progress progress-striped active image-progress"><div class="bar" style="width: 100%;"></div></div>');

    if (!!file.type.match(/image.*/)) {
        if (window.FileReader) {
            reader = new FileReader();
            reader.readAsDataURL(file);
        }

        data = new FormData();

        data.append('userfile', file);

        $.ajax({
            url: 'upload',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (res) {

                var json = $.parseJSON(res),
                    msg = json.msg,
                    success = json.success;
                    path = json.path;

                if (success === 'false') {

                    response.html('<div class="alert alert-error">' +
                                      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                      '<strong>Oops! </strong>' + msg +
                                  '</div>');
                }

                if (success === 'true') {
                    response.html('<div class="alert alert-success">' +
                                      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                      '<strong>Success! </strong>The image ' + msg + ' has been successfully uploaded!' +
                                  '</div>');
                    filename.attr('value', 'http://www.conquertheself.com/img/uploads/articles/' + msg);
                }
            }
        });
    }
}

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
});

(function () {
    var slug = $("#slug"),
        title = $("#title"),
        str;

    title.keyup(function () {
        str = this.value.replace(/\s+/g, '-').toLowerCase().replace(/[^0-9a-zA-Z-_ ]/gi, '');
        slug.val(str);
    });

    title.blur(function () {
        str = this.value.replace(/\s+/g, '-').toLowerCase().replace(/[^0-9a-zA-Z-_ ]/gi, '');
        slug.val(str);
    });

})();