<?php include ('../../../config.php');

$getusers = $mysqli->query("SELECT * FROM users WHERE username != 'admin' ORDER BY id DESC");


?>

<div class="card">

    <h5 class="card-header">Users <strong>

        </strong></h5>
    <div class="card-body">

        <table id="bs4-table" class="table table-striped table-bordered"
               style="width:100% !important;">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>

                <th>Delete</th>

            </tr>
            </thead>
            <tbody>

            <?php
            while ($resusers = $getusers->fetch_assoc()) {


                ?>
                <tr>
                    <td><?php echo $resusers['fullname']; ?></td>
                    <td><?php echo $resusers['username']; ?></td>
                    <td>
                        <button type="button"
                                data-type="confirm"
                                class="btn btn-sm btn-danger js-sweetalert delete_user"
                                i_index="<?php echo $resusers['id']; ?>"
                                title="Delete">
                            <i class="icon-trash" style="color:#fff !important;"></i>
                        </button>

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




    $(document).on('click', '.delete_user', function () {
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
                        url: "ajax/queries/delete_user.php",
                        data: {
                            i_index: i_index
                        },
                        dataType: "html",

                        success: function (text) {

                            $.ajax({
                                type: "POST",
                                url: "ajax/tables/users_table.php",
                                beforeSend: function () {
                                    $.blockUI({
                                        message: '<img src="assets/img/load.gif"/>'
                                    });
                                },
                                success: function (text) {
                                    $('#users_table_div').html(text);
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

                    swal("Deleted!", "User has been deleted.", "success");

                } else {
                    swal("Cancelled", "Data is safe.", "error");
                }
            });


    });

</script>

