<?php

include('../../../config.php');

$aboutid = $_POST['id_index'];

$getabout = $mysqli->query("select * from about LIMIT 1");
$resabout = $getabout->fetch_assoc();


?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Update Abouts</h5>
            <div class="card-body">

                <form>


                    <div class="form-group">
                        <label for="bible_quote">Mission Statement </label>
                        <textarea class="form-control" id="mission_statement_edit" rows="6"
                                  placeholder="Enter mission statement"><?php echo $resabout['mission_statement'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="bible_quote">Vision </label>
                        <textarea class="form-control" id="vision_edit" rows="6"
                                  placeholder="Enter vision"><?php echo $resabout['vision'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="bible_quote">Mission</label>
                        <textarea class="form-control" id="mission_edit" rows="6"
                                  placeholder="Enter mission"><?php echo $resabout['mission'] ?></textarea>
                    </div>


                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="saveabout_edit"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $("#saveabout_edit").click(function () {

        var mission_statement = $("#mission_statement_edit").val();
        var vision = $("#vision_edit").val();
        var mission = $("#mission_edit").val();
        var aboutid = '<?php echo $aboutid ?>';


        var error = '';


        if (mission_statement == "") {
            error += 'Please enter mission statement \n';
            $('#mission_statement').focus();
        }

        if (vision == "" && mission == "") {
            error += 'Please enter vision or mission \n';
            $('#vision').focus();
        }



        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_about.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    mission_statement: mission_statement,
                    vision: vision,
                    mission: mission,
                    aboutid:aboutid

                },
                success: function (text) {

                    //alert(text);

                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/about_form.php",
                        success: function (text) {
                            $('#about_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },

                    });

                    $.ajax({
                        type: "POST",
                        url: "ajax/tables/about_table.php",
                        success: function (text) {
                            $('#about_table_div').html(text);
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