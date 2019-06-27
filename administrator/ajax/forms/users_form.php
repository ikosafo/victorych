<?php

include('../../../config.php');

$usersid = date("ymdhis") . rand(1, 10);

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Add User</h5>
            <div class="card-body">

                <form autocomplete="off">
                    
                    <div class="form-group">
                        <label for="full_name">Full Name </label>
                        <input type="text" class="form-control" id="full_name"
                               placeholder="Enter Full Name">
                    </div>


                    <div class="form-group">
                        <label for="username">Username </label>
                        <input type="text" class="form-control" id="username"
                               placeholder="Enter Username">
                    </div>


                    <div class="form-group">
                        <label for="password">Default Password </label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Enter Password" value="V123456">
                    </div>


                    <div class="form-group">
                        <label for="password">Confirm Password </label>
                        <input type="password" class="form-control" id="confirm_password"
                               placeholder="Confirm Password">
                    </div>


                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="saveusers"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $("#saveusers").click(function () {

        var full_name = $("#full_name").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        //alert(users_name);

        var error = '';


        if (full_name == "") {
            error += 'Please enter full name \n';
            $('#full_name').focus();
        }

        if (username == "") {
            error += 'Please enter username \n';
            $('#username').focus();
        }

        if (password == "") {
            error += 'Please enter password \n';
            $('#password').focus();
        }

        if (password != "" && password.length < 4) {
            error += 'Minimum characters should be four \n';
            $("#password").focus();
        }

        if (password != "" && confirm_password == "") {
            error += 'Please confirm password \n';
            $('#confirm_password').focus();
        }

        if (password != "" && confirm_password != "" && password != confirm_password) {
            error+= 'Passwords do not match \n';
            $('#confirm_password').focus();
        }




        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_users.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    full_name: full_name,
                    username: username,
                    password: password
                },
                success: function (text) {

                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/users_form.php",
                        success: function (text) {
                            $('#users_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },

                    });

                    $.ajax({
                        type: "POST",
                        url: "ajax/tables/users_table.php",
                        success: function (text) {
                            $('#users_table_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },

                    });

                },

                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
                complete: function () {
                    $.unblockUI();
                },

            });

        }


        else {

            $('#error_loc').notify(error);

        }

        return false;

    });

</script>