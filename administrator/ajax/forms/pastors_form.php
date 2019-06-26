<?php

include('../../../config.php');

$pastorsid = date("ymdhis") . rand(1, 10);

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Add Pastor</h5>
            <div class="card-body">

                <form autocomplete="off">
                    <div class="form-group">
                        <label for="pastors_name">Pastor's Name </label>
                        <input type="text" class="form-control" id="pastors_name"
                               placeholder="Enter Pastor's Name">
                    </div>

                    <div class="form-group">
                        <label for="pastors_description">Description </label>
                        <textarea class="form-control" id="pastors_description" rows="5"
                                  placeholder="Enter description"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="pastors_upload">Image to display</label>
                        <input type="file" class="form-control" id="pastors_upload">
                        <input type="hidden" id="selected"/>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savepastors"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $('#pastors_upload').uploadifive({
        'auto': false,
        'method': 'post',
        'buttonText': "Upload image",
        'multi': false,
        'width': 180,
        'formData': {'randno': '<?php echo $pastorsid ?>'},
        'dnd': false,
        'uploadScript': 'ajax/queries/upload_pastors.php',
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



    $("#savepastors").click(function () {

        var pastors_name = $("#pastors_name").val();
        var pastors_description = $("#pastors_description").val();
        var pastors_id = '<?php echo $pastorsid; ?>';


        var error = '';


        if (pastors_name == "") {
            error += 'Please enter name of pastor \n';
            $('#pastors_name').focus();
        }

        if (pastors_description == "") {
            error += 'Please enter description \n';
            $("#pastors_description").focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_pastors.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    pastors_name: pastors_name,
                    pastors_description: pastors_description,
                    pastors_id: pastors_id

                },
                success: function (text) {

                    //alert(text);

                    var selected = $("#selected").val();

                    if (selected == 'yes') {

                        $('#pastors_upload').uploadifive('upload');


                        $.notify("Profile Saved", "success", {position: "top center"});

                        location.reload();


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