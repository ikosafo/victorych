<?php

include('../../../config.php');

$eventsid = date("ymdhis") . rand(1, 10);

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Add Event</h5>
            <div class="card-body">

                <form>
                    <div class="form-group">
                        <label for="events_text1">Event Name </label>
                        <input type="text" class="form-control" id="event_name"
                               placeholder="Enter Document Title">
                    </div>

                    <div class="form-group">
                        <label for="events_text2">Event Date </label>
                        <input type="text" class="form-control" id="event_date"
                               placeholder="Select event date">
                    </div>

                    <div class="form-group">
                        <label for="events_text2">Event Time </label>
                        <input type="text" class="form-control" id="event_time"
                               placeholder="Select event time">
                    </div>

                    <div class="form-group">
                        <label for="events_text2">Event Venue </label>
                        <input type="text" class="form-control" id="event_venue"
                               placeholder="Enter event venue">
                    </div>

                    <div class="form-group">
                        <label for="events_text2">Event Description </label>
                        <textarea class="form-control" id="event_description"
                                  placeholder="Enter description"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="events_upload">Image to display</label>
                        <input type="file" class="form-control" id="events_upload">
                        <input type="hidden" id="selected"/>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="saveevents"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $('#events_upload').uploadifive({
        'auto': false,
        'method': 'post',
        'buttonText': "Upload event's image",
        'multi': false,
        'width': 200,
        'formData': {'randno': '<?php echo $eventsid ?>'},
        'dnd': false,
        'uploadScript': 'ajax/queries/upload_event.php',
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


    $("#event_date").flatpickr({
        mode: "range"
    });

    $("#event_time").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i"
    });

    $("#saveevents").click(function () {

        var event_name = $("#event_name").val();
        var event_date = $("#event_date").val();
        var event_time = $("#event_time").val();
        var event_venue = $("#event_venue").val();
        var event_description = $("#event_description").val();
        var event_id = '<?php echo $eventsid; ?>';

        //alert(events_name);

        var error = '';


        if (event_name == "") {
            error += 'Please enter name of event \n';
            $('#event_name').focus();
        }

        if (event_date == "") {
            error += 'Please select date \n';
        }

        if (event_time == "") {
            error += 'Please select time \n';
        }

        if (event_venue == "") {
            error += 'Please enter venue \n';
            $("#event_venue").focus();
        }

        if (event_description == "") {
            error += 'Please enter description \n';
            $("#event_description").focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_events.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                event_name: event_name,
                event_date: event_date,
                event_time: event_time,
                event_venue: event_venue,
                event_description: event_description,
                event_id: event_id

                },
                success: function (text) {

                    //alert(text);

                    var selected = $("#selected").val();

                    if (selected == 'yes') {

                        $('#events_upload').uploadifive('upload');


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