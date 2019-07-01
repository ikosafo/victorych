<?php

include('../../../config.php');

$getmessage = $mysqli->query("select * from history LIMIT 1");
$resmessage = $getmessage->fetch_assoc();

$historyid = $resmessage['id'];

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">History</h5>
            <div class="card-body">

                <form>


                    <div class="form-group">
                        <label for="bible_quote">Message</label>
                        <textarea class="form-control" id="history_message"
                                  placeholder="Enter message"><?php echo $resmessage['message'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savehistory"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>

    $("#history_message").summernote({
        placeholder: 'Enter message here',
        tabsize: 2,
        height: 200
    });


    $("#savehistory").click(function () {

        var history_message = $("#history_message").val();
        var history_id = '<?php echo $historyid; ?>';

        var error = '';


        if (history_message == "") {
            error += 'Please enter message \n';
            $('#history_message').focus();
        }



        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_history.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    history_message: history_message,
                    history_id: history_id

                },
                success: function (text) {

                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/history_form.php",
                        success: function (text) {
                            $('#history_form_div').html(text);
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