<?php

include('../../../config.php');

$homesliderid = date("ymdhis") . rand(1, 10);

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Home Page Slider Information</h5>
            <div class="card-body">

                <form>
                    <div class="form-group">
                        <label for="homeslider_text1">First Text (Small) </label>
                        <input type="text" class="form-control" id="homeslider_text1"
                               placeholder="Enter Document Title">
                    </div>

                    <div class="form-group">
                        <label for="homeslider_text2">Heading (Large and Bold) </label>
                        <input type="text" class="form-control" id="homeslider_text2"
                               placeholder="Enter Document Title">
                    </div>

                    <div class="form-group">
                        <label for="homeslider_text2">Text Descriptions (Small and Lengthy) </label>
                        <textarea class="form-control" id="homeslider_description"
                                  placeholder="Enter Document Title"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="homeslider_upload">Image to display</label>
                        <input type="file" class="form-control" id="homeslider_upload">
                        <input type="hidden" id="selected"/>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savehomeslider"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $('#homeslider_upload').uploadifive({
        'auto': false,
        'method': 'post',
        'buttonText': 'Upload homeslider',
        'multi': false,
        'width': 180,
        'formData': {'randno': '<?php echo $homesliderid ?>'},
        'dnd': false,
        'uploadScript': 'ajax/queries/upload_homeslider.php',
        'onUploadComplete': function (file, data) {
            console.log(data);
        },
        'onSelect': function (file) {
            // Update selected so we know they have selected a file
            $("#selected").val('yes');

        },
        'onCancel': function (file) {
            // Update selected so we know they have no file selected
            $("#selected").val('');
        }
    });


    $("#savehomeslider").click(function () {

        var homeslider_text1 = $("#homeslider_text1").val();
        var homeslider_text2 = $("#homeslider_text2").val();
        var homeslider_description = $("#homeslider_description").val();
        var homeslider_id = '<?php echo $homesliderid; ?>';

        //alert(homeslider_name);

        var error = '';


        if (homeslider_text1 == "") {
            error += 'Please enter first text \n';
            $('#homeslider_text1').focus();
        }

        if (homeslider_text2 == "") {
            error += 'Please enter heading \n';
            $('#homeslider_text2').focus();
        }

        if (homeslider_description == "") {
            error += 'Please enter description \n';
            $('#homeslider_description').focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_homeslider.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    homeslider_text1: homeslider_text1,
                    homeslider_text2: homeslider_text2,
                    homeslider_description: homeslider_description,
                    homeslider_id: homeslider_id
                },
                success: function (text) {

                    //alert(text);

                    var selected = $("#selected").val();

                    if (selected == 'yes') {

                        $('#homeslider_upload').uploadifive('upload');


                        $.notify("Profile Saved", "success", {position: "top center"});

                        $.ajax({
                            url: "ajax/forms/homeslider_form.php",
                            success: function (text) {
                                $('#homeslider_form_div').html(text);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            },

                        });


                        $.ajax({
                            url: "ajax/tables/homeslider_table.php",
                            success: function (text) {
                                $('#homeslider_table_div').html(text);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            },

                        });


                        $.ajax({
                            url: "ajax/tables/homeslider_table.php",
                            success: function (text) {
                                $('#homeslider_table_div').html(text);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            },

                        });


                    } else {

                        $('#error_loc').notify("Please select a file to upload");

                    }


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