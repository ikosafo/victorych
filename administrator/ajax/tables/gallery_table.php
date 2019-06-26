<?php include('../../../config.php');

$getgallery = $mysqli->query("select * from eventgallery ORDER by id DESC");


?>

    <div class="card">

        <h5 class="card-header">Gallery <strong>

            </strong></h5>
        <div class="card-body">

            <table id="bs4-table" class="table table-striped table-bordered"
                   style="width:100% !important;">
                <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Pictures</th>

                </tr>
                </thead>
                <tbody>

                <?php
                while ($resgallery = $getgallery->fetch_assoc()) {


                    ?>
                    <tr>
                        <td><?php echo $resgallery['eventname']; ?></td>
                        <td>
                            <?php

                            $galleryid = $resgallery['galleryid'];

                            $getpics = $mysqli->query("select * from gallery where galleryid = '$galleryid'");
                            while ($respics = $getpics->fetch_assoc()) {
                                ?>
                                <img src="../<?php echo $respics['imagelocation'] ?>" width="90" height="90"/>

                                <button type="button"
                                        data-type="confirm"
                                        class="btn btn-sm btn-danger js-sweetalert delete_picture ml-5"
                                        i_index="<?php echo $respics['id']; ?>"
                                        title="Delete">
                                    <i class="icon-trash" style="color:#fff !important;"></i>
                                </button>

                                <br/><hr/>
                                <?php
                            }
                            ?>



                        </td>


                    </tr>

                    <?php
                }
                ?>
                </tbody>
                <tfoot>

            </table>


        </div>


    </div>

    <script>
        $('#bs4-table').DataTable({
            aaSorting: [],
            dom: 'Bfrtip'
        });


        $(document).on('click', '.delete_picture', function () {
            var i_index = $(this).attr('i_index');

            //alert(i_index);

            swal({
                    title: "Do you want to delete this?",
                    text: "You will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            type: "POST",
                            url: "ajax/queries/delete_picture.php",
                            data: {
                                i_index: i_index
                            },
                            dataType: "html",

                            success: function (text) {

                                $.ajax({
                                    type: "POST",
                                    url: "ajax/tables/gallery_table.php",
                                    beforeSend: function () {
                                        $.blockUI({
                                            message: '<img src="assets/img/load.gif"/>'
                                        });
                                    },
                                    success: function (text) {
                                        $('#gallery_table_div').html(text);
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
                                    },
                                    complete: function () {
                                        $.unblockUI();
                                    },

                                });

                            },

                            complete: function () {

                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            }
                        });

                        swal("Deleted!", "Image has been deleted.", "success");

                    } else {
                        swal("Cancelled", "Data is safe.", "error");
                    }
                });


        });

    </script>

