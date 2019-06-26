<?php

include('../../../config.php');

$getmessage = $mysqli->query("select * from overseer LIMIT 1");
$resmessage = $getmessage->fetch_assoc();

$overseerid = $resmessage['id'];

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Overseer's Message</h5>
            <div class="card-body">

                <form>


                    <div class="form-group">
                        <label for="bible_quote">Message</label>
                        <textarea class="form-control" id="overseer_message"
                                  placeholder="Enter message"><?php echo $resmessage['message'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="saveoverseer"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>

    $("#overseer_message").summernote({
        placeholder: 'Enter message here',
        tabsize: 2,
        height: 200
    });


    $("#saveoverseer").click(function () {

        var overseer_message = $("#overseer_message").val();
        var overseer_id = '<?php echo $overseerid; ?>';

        var error = '';


        if (overseer_message == "") {
            error += 'Please enter message \n';
            $('#overseer_message').focus();
        }



        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_overseer.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    overseer_message: overseer_message,
                    overseer_id: overseer_id

                },
                success: function (text) {

                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/overseer_form.php",
                        success: function (text) {
                            $('#overseer_form_div').html(text);
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