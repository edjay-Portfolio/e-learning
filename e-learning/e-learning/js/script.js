$('document').ready(function()
{
    /* validation */
    $("#ann-form").validate({
        rules:
        {
            title: {
                required: true,
                minlength: 8,
                maxlength: 25
            },
            info: {
                required: true,
                minlength: 10
            },
        },
        messages:
        {
            title: "Input at least 8 Characters",
            info: "Input at least 10 Characters",
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#ann-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'script/addannouncement.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>!</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');

                    });

                }
                else if(data=="registered")
                {

                    $("#btn-submit").html('Signing Up');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("successreg.php"); }); ',5000);

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span>   '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});