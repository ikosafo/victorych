<?php

include('../../../config.php');

$scripturesid = date("ymdhis") . rand(1, 10);

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div id="error_loc"></div>
            <h5 class="card-header">Add Scripture</h5>
            <div class="card-body">

                <form>
                    <div class="form-group">
                        <label for="bible_verse">Bible Verse </label>
                        <input type="text" class="form-control" id="bible_verse"
                               placeholder="Enter Bible Verse">
                    </div>

                    <div class="form-group">
                        <label for="bible_quote">Quote </label>
                        <textarea class="form-control" id="bible_quote" rows="5"
                                  placeholder="Enter quotation"></textarea>
                    </div>


                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savescriptures"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>


    $("#savescriptures").click(function () {

        var bible_verse = $("#bible_verse").val();
        var bible_quote = $("#bible_quote").val();

        //alert(scriptures_name);

        var error = '';


        if (bible_verse == "") {
            error += 'Please enter verse \n';
            $('#bible_verse').focus();
        }

        if (bible_quote == "") {
            error += 'Please enter quote \n';
            $('#bible_quote').focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_scriptures.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    bible_verse: bible_verse,
                    bible_quote: bible_quote
                },
                success: function (text) {

                    //alert(text);
                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/scriptures_form.php",
                        success: function (text) {
                            $('#scriptures_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },

                    });

                    $.ajax({
                        type: "POST",
                        url: "ajax/tables/scriptures_table.php",
                        success: function (text) {
                            $('#scriptures_table_div').html(text);
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