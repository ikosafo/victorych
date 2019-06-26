<?php

include('../../../config.php');

$galleryid = date("ymdhis") . rand(1, 10);

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Add Gallery</h5>
            <div class="card-body">

                <form autocomplete="off">
                    <div class="form-group">
                        <label for="event_name">Event Name </label>
                        <input type="text" class="form-control" id="event_name"
                               placeholder="Enter Event's Name">
                    </div>


                    <div class="form-group">
                        <label for="gallery_upload">Image to display</label>
                        <input type="file" class="form-control" id="gallery_upload">
                        <input type="hidden" id="selected"/>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savegallery"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $('#gallery_upload').uploadifive({
        'auto': false,
        'method': 'post',
        'buttonText': "Upload image",
        'multi': true,
        'width': 180,
        'formData': {'randno': '<?php echo $galleryid ?>'},
        'dnd': false,
        'uploadScript': 'ajax/queries/upload_gallery.php',
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



    $("#savegallery").click(function () {

        var event_name = $("#event_name").val();
        var gallery_id = '<?php echo $galleryid; ?>';


        var error = '';


        if (event_name == "") {
            error += 'Please enter name of event \n';
            $('#event_name').focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_gallery.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    event_name: event_name,
                    gallery_id: gallery_id

                },
                success: function (text) {

                    //alert(text);

                    var selected = $("#selected").val();

                    if (selected == 'yes') {

                        $('#gallery_upload').uploadifive('upload');


                        $.notify("Gallery Saved", "success", {position: "top center"});

                        location.reload();


                    } else {

                        $('#error_loc').notify("Please select file(s) to upload");

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