window.paceOptions = {
    startOnPageLoad: false,
    ajax: {
        trackMethods: ['POST']
    }
};

$(function() {

    var confirmUnload = function (e) {
        var confirmationMessage = 'You have entered new data on this page. If you navigate away from this page ' +
            'without first saving your data, the changes will be lost.';

        e.returnValue = confirmationMessage;     // Gecko, Trident, Chrome 34+
        return confirmationMessage;              // Gecko, WebKit, Chrome <34
    };

    /*$(':input').one('change keydown', function() {
        window.addEventListener('beforeunload', confirmUnload);
    });*/

    $('form').on('submit', function(e) {
		e.preventDefault();
        //window.removeEventListener('beforeunload', confirmUnload);

        if ($(this).find('input[name="_method"]').val() === 'DELETE') {
            return true;
        }

        Pace.restart();

        var $form = $(this);
        var data = new FormData($(this)[0]);
        var inputs = $form.find('button, input, textarea, select, checkbox');

        
        //inputs.prop('disabled', true);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            statusCode: {
                422: function (jqXHR) {
                    $('.form-group.has-error').removeClass('has-error');
                    $.each(jqXHR.responseJSON.errors, function (attr, value) {
                        attr = $form.has('[data-id="' + attr + '"]') ? attr : attr.split('.')[0];
                        var resultstr = attr.split('.');
                        if(resultstr.length>1 && resultstr[0]=="image"){
                            attr = "image";  
                        }
                        $form.find('[data-id="' + attr + '"]')
                             .addClass('has-error')
                             .find('.help-block strong')
                             .text(value[0]);
                    });
                }
            },
            success: function (url) {
                window.location.assign(url);
            },
            error: function (jqXHR) {
                if (jqXHR.status !== 422) {
                    console.log(jqXHR);
                }
                //inputs.prop('disabled', false);
            }
        });
    });
});
