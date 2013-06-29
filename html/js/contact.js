(function () {

    var contact = $('#btnContact');

    contact.on('click', function (e) {

        e.preventDefault();

        // Set Variables
        var contactHeader = $('#contactHeader'),
            contactBody   = $('#contactBody'),
            inputName     = $('#name'),
            inputEmail    = $('#email'),
            inputComments = $('#comments'),
            valName       = inputName.val(),
            valEmail      = inputEmail.val(),
            valComments   = inputComments.val(),
            errorName     = $('#nameError'),
            errorEmail    = $('#emailError'),
            errorComments = $('#commentsError');

        // Make sure the fields are not empty before continuing
        if (valName === '') {
            errorName.show();
            inputName.focus();
            return false;
        } else {
            errorName.hide();
        }

        if (valEmail === '') {
            errorEmail.show();
            inputEmail.focus();
            return false;
        } else {
            errorEmail.hide();
        }

        if (valComments === '') {
            errorComments.show();
            inputComments.focus();
            return false;
        } else {
            errorComments.hide();
        }

        // Set Form Data
        data = new FormData();

        data.append('name', valName);
        data.append('email', valEmail);
        data.append('comments', valComments);

        $.ajax({
            url: 'contact/send',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(data) {

                var json     = $.parseJSON(data),
                    success  = json.success,
                    view     = json.view,
                    name     = json.name;
                    email    = json.email;
                    comments = json.comments;

                if (success === 'false') {
                    errorName.html(name).show();
                    errorEmail.html(email).show();
                    errorComments.html(comments).show();
                }

                if (success === 'true') {
                    contactHeader.html('Thank You!');
                    contactBody.html('<h2>Your message has been sent successfully, we will be in touch soon.</h2>');
                    contact.remove();
                }
            }
        });
    });
}());