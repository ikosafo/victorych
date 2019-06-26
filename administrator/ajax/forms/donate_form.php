<?php

include('../../../config.php');

$getmessage = $mysqli->query("select * from donate LIMIT 1");
$resmessage = $getmessage->fetch_assoc();

$donateid = $resmessage['id'];

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Donate</h5>
            <div class="card-body">

                <form>


                    <div class="form-group">
                        <label for="bible_quote">Message</label>
                        <textarea class="form-control" id="donate_message"
                                  placeholder="Enter message"><?php echo $resmessage['message'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savedonate"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>

    $("#donate_message").summernote({
        placeholder: 'Enter message here',
        tabsize: 2,
        height: 200
    });


    $("#savedonate").click(function () {

        var donate_message = $("#donate_message").val();
        var donate_id = '<?php echo $donateid; ?>';

        var error = '';


        if (donate_message == "") {
            error += 'Please enter message \n';
            $('#donate_message').focus();
        }



        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_donate.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    donate_message: donate_message,
                    donate_id: donate_id

                },
                success: function (text) {

                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/donate_form.php",
                        success: function (text) {
                            $('#donate_form_div').html(text);
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