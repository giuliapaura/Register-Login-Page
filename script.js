$(document).ready(function () {

    $("#signup-form").submit(function (event) {
        event.preventDefault();
        var username = $("#signup-uid").val();
        var mail = $("#signup-mail").val();
        var password = $("#signup-password").val();
        var repeat = $("#signup-pwd-repeat").val();
        var submit = $("#signup-sub-button").val();

        $(".form-message").load("conn/signup.con.php", {
            postusername: username,
            postmail: mail,
            postpassword: password,
            postrepeat: repeat,
            postsubmit: submit

        });


    });




});

$(document).ready(function () {
    $("#edit-form").submit(function (event) {
        event.preventDefault();
        console.log('ciao');
        var usernameEdit = $("#edit-uid").val();
        var mailEdit = $("#edit-mail").val();
        var passwordEdit = $("#edit-password").val();
        var repeatEdit = $("#edit-pwd-repeat").val();
        var submitEdit = $("#edit-sub-button").val();



        $(".edit-message").load("conn/edit.con.php", {
            editusername: usernameEdit,
            editmail: mailEdit,
            editpassword: passwordEdit,
            editrepeat: repeatEdit,
            editsubmit: submitEdit

        });


    });

});

$(document).ready(function () {
    $("#delete-form").submit(function (event) {
        event.preventDefault();

        var userDelete = $("#delete-uid").val();
        var submitDelete = $("#delete-sub-button").val();

        $(".edit-message").load("conn/delete.con.php", {

            uId: userId,
            deleteuser: userDelete

        });


    });

});