<?php

include('../../../config.php');

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Add Branch</h5>
            <div class="card-body">

                <form autocomplete="off">
                    <div class="form-group">
                        <label for="bible_verse">Branch Name </label>
                        <input type="text" class="form-control" id="branch_name"
                               placeholder="Enter Branch Name">
                    </div>

                    <div class="form-group">
                        <label for="bible_quote">Description </label>
                        <textarea class="form-control" id="branch_description" rows="5"
                                  placeholder="Enter description"></textarea>
                    </div>


                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savebranches"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $("#savebranches").click(function () {

        var branch_name = $("#branch_name").val();
        var branch_description = $("#branch_description").val();


        var error = '';


        if (branch_name == "") {
            error += 'Please enter branch name \n';
            $('#branch_name').focus();
        }

        if (branch_description == "") {
            error += 'Please enter description \n';
            $('#branch_description').focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_branches.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    branch_name: branch_name,
                    branch_description: branch_description
                },
                success: function (text) {

                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/branches_form.php",
                        success: function (text) {
                            $('#branches_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },

                    });

                    $.ajax({
                        type: "POST",
                        url: "ajax/tables/branches_table.php",
                        success: function (text) {
                            $('#branches_table_div').html(text);
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