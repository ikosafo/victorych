<?php include('../../../config.php');

$getabout = $mysqli->query("select * from about LIMIT 1");
$resabout = $getabout->fetch_assoc();


?>

<div class="card">

    <h5 class="card-header">About VIC <strong>

        </strong></h5>
    <div class="card-body">

        <table id="bs4-table" class="table table-bordered"
               style="width:100% !important;">

            <tbody>

            <tr>
                <td>MISSION STATEMENT</td>
                <td style="max-width: 300px"><?php echo $resabout['mission_statement']; ?></td>


                <td>
                    <button type="button"
                            data-type="confirm"
                            class="btn btn-sm btn-danger js-sweetalert edit_about"
                            i_index="<?php echo $resabout['id']; ?>"
                            title="Edit">
                        <i class="icon-pencil" style="color:#fff !important;"></i>
                    </button>

                </td>
            </tr>


            <tr>
                <td>VISION</td>
                <td style="max-width: 300px"><?php echo $resabout['vision']; ?></td>


                <td>
                    <button type="button"
                            data-type="confirm"
                            class="btn btn-sm btn-danger js-sweetalert edit_about"
                            i_index="<?php echo $resabout['id']; ?>"
                            title="Edit">
                        <i class="icon-pencil" style="color:#fff !important;"></i>
                    </button>

                </td>
            </tr>


            <tr>
                <td>MISSION</td>
                <td style="max-width: 300px"><?php echo $resabout['vision']; ?></td>


                <td>
                    <button type="button"
                            data-type="confirm"
                            class="btn btn-sm btn-danger js-sweetalert edit_about"
                            i_index="<?php echo $resabout['id']; ?>"
                            title="Edit">
                        <i class="icon-pencil" style="color:#fff !important;"></i>
                    </button>

                </td>
            </tr>


            </tbody>
            <tfoot>

        </table>


    </div>


</div>

<script>


    $('.edit_about').click(function() {

        var id_index = $(this).attr('i_index');

        $.ajax({
            type: "POST",
            url: "ajax/forms/about_form_edit.php",
            data: {
                id_index:id_index
            },
            beforeSend: function () {
                $.blockUI({
                    message: '<img src="assets/img/load.gif"/>'
                });
            },

            success: function (text) {
                $('#about_form_div').html(text);
            },

            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                $.unblockUI();
            },

        });


    });

    
</script>


