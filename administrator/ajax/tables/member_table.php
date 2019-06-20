<?php include('../../../config.php');

//$branch = $_SESSION['branch'];

$getmember = $mysqli->query("select * from member where status IS NULL ORDER by surname,firstname,othername");


?>

    <div class="card">

        <h5 class="card-header">Members <strong>

            </strong></h5>
        <div class="card-body">

            <table id="bs4-table" class="table table-striped table-bordered"
                   style="width:100% !important;">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Telephone</th>
                    <th>Branch</th>
                    <th>Gender</th>
                    <th>Residence</th>
                    <th>Marital Status</th>
                    <th>Department</th>
                    <th>Action</th>


                </tr>
                </thead>
                <tbody>

                <?php
                while ($resmember = $getmember->fetch_assoc()) {

                    $memberid = $resmember['memberid'];
                    $lmem = lock($memberid);
                    ?>
                    <tr>
                        <td><?php
                            $img = $mysqli->query("select * from member_images
                            where memberid = '$memberid'");

                            $fetch_img = $img->fetch_assoc() ?>

                            <img src="../<?php echo $fetch_img['image_location'] ?>"
                                 class="w-50 rounded-circle" alt="Member Image"><br/>
                            <?php echo $resmember['surname'] . ' ' . $resmember['firstname'] . ' ' . $resmember['othername']; ?>
                        </td>
                        <td>
                            <?php echo $resmember['telephone'] ?>
                        </td>
                        <td>
                            <?php
                            $branchid = $resmember['branch'];
                                $getb = $mysqli->query("select * from branch where id = '$branchid'");
                                $resb = $getb->fetch_assoc();
                                echo $resb['name'];

                            ?>
                        </td>
                        <td>
                            <?php echo $resmember['gender'] ?>
                        </td>
                        <td>
                            <?php echo $resmember['residence'] ?>
                        </td>
                        <td>
                            <?php echo $resmember['maritalstatus'] ?>
                        </td>
                        <td>
                            <?php $di = $resmember['department'];
                            $getd = $mysqli->query("select * from department where id = '$di'");
                            $resd = $getd->fetch_assoc();
                            echo $resd['department_name'];
                            if ($di == "None") {
                                echo "None";
                            }
                            ?>
                        </td>
                        <td>
                            <button type="button"
                                    class="btn btn-sm btn-warning view_member"
                                    i_index="<?php echo $resmember['id']; ?>"
                                    title="View"><i
                                    class="icon-eye" style="color:#fff !important;"></i>
                            </button>

                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-danger js-sweetalert delete_member"
                                    i_index="<?php echo $resmember['id']; ?>"
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

        $('#bs4-table').DataTable();


        $(document).on('click', '.view_member', function () {

            var id_index = $(this).attr('i_index');

            //alert(id_index);

            $.ajax({
                type: "POST",
                url: "ajax/forms/member_details.php",
                data:
                    {
                        id_index: id_index
                    },
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                success: function (text) {
                    $('#member_table_div').html(text);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
                complete: function () {
                    $.unblockUI();
                },

            });


        });


        $(document).on('click', '.edit_member', function () {

            var id_index = $(this).attr('i_index');

            //alert(id_index);

            $.ajax({
                type: "POST",
                url: "ajax/forms/member_form_edit.php",
                data:
                    {
                        id_index: id_index
                    },
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                success: function (text) {
                    $('#member_table_div').html(text);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
                complete: function () {
                    $.unblockUI();
                },

            });


        });


        $(document).on('click', '.delete_member', function () {
            var i_index = $(this).attr('i_index');

            //alert(i_index);

            swal({
                    title: "Do you want to delete this?",
                    text: "You will not be able to recover this data!",
                    footer: '<a href="ajax/queries/safedeletemember.php?memberid=<?php echo $lmem; ?>"><u>Delete but keep the data</u></a>',
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
                            url: "ajax/queries/delete_member.php",
                            data: {
                                i_index: i_index
                            },
                            dataType: "html",

                            success: function (text) {

                                $.ajax({
                                    type: "POST",
                                    url: "ajax/tables/member_table.php",
                                    beforeSend: function () {
                                        $.blockUI({
                                            message: '<img src="assets/img/load.gif"/>'
                                        });
                                    },
                                    success: function (text) {
                                        $('#member_table_div').html(text);
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

                        swal("Deleted!", "Member has been deleted.", "success");

                    } else {
                        swal("Cancelled", "Data is safe.", "error");
                    }
                });


        });


    </script>

