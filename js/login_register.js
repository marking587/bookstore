/**
 * Created by robertkestel on 29.01.17.
 */
$('document').ready(function () {
    /* validation */
    $("#login_form").validate({
        rules: {
            password: {
                required: true
                , }
            , }
        , messages: {
            password: {
                required: "please enter your password"
            }
            , user: "please enter your username"
            , }
        , submitHandler: submitForm
    });
    function submitForm() {

        var data = $("#login_form").serialize();
        //console.log(data);

        $.ajax({
            type: 'POST'
            , url: './api/login.php'
            , data: data
            , beforeSend: function () {
                $("#error").fadeOut();
                //				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            }
            , success: function (response) {
                if (response == "ok") {
                    $("#login_form").html('<img class="load_img" src="./img/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                    //						setTimeout(' window.location.href = "./home.php"; ',4000);
                    window.location.href = "./index.php?Page=accountUI";
                }
                else {
                    $("#error").fadeIn(1000, function () {
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                    });
                }
            }
        });
        return false;
    }
    $("#register-form").validate({
        rules: {
            password: {
                required: true
                , }

            , }
        , messages: {
            password: {
                required: "please enter your password"
            }
            , user: "please enter your username"
            , }
        , submitHandler: submitForm2
    });
    function submitForm2() {
        var data = $("#register-form").serialize();
        $.ajax({
            type: 'POST'
            , url: './api/register.php'
            , data: data
            , beforeSend: function () {
                $("#error").fadeOut();
                //				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            }
            , success: function (response) {
                if (response == "ok") {
                    //                    $("#btn-regist").html('<img class="load_img" src="./img/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                    $("#error2").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Registrierung erfolgreich!</div>');
                    setTimeout(' window.location.href = "./index.php?Page=loginUI"; ', 4000);
                    //                    window.location.href = "./home.php";
                }
                else {
                    $("#error2").fadeIn(1000, function () {
                        $("#error2").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                        //                        $("#btn-regist").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        });
        return false;
    }


});

function del_user_alert() {
    confirm('User entfernen');
    del_user();
};
function del_user() {
    $.ajax({url: "./admin/delete_user.php"}).done(function () {window.location.href = "./home.php";});
};