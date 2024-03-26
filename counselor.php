<?php include 'header.php';
include 'root/process.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="col-md-12">
                    <div class="card-body">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Add Counselor
                        </button>
                    </div>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Counselor</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!--`id`, `name`, `national_id`, `qualifications`, `contact`, `address`, `nationality`, `next_of_kin`, `relative_contact`, `status`-->
                                <div class="modal-body">
                                    <form method="POST" action="">

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label >Counselor Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Couselor's Name" required>
                                            </div>
                                            <div class="form-group col">
                                                <label>National ID</label>
                                                <input type="text" class="form-control" name="national_id" placeholder="Enter national ID" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label>Qualifications</label>
                                                <input type="text" class="form-control" name="qualifications" placeholder="Enter qualifications" required>
                                            </div>
                                            <div class="form-group col">
                                                <label>Contact</label>
                                                <input type="text" class="form-control" name="contact" placeholder="Enter Contact" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="username">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                                            </div>
                                            <div class="form-group col">
                                                <label >Nationality</label>
                                                <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="username">Next_of_kin</label>
                                                <input type="text" class="form-control" name="next_of_kin" placeholder="Enter next of kin" required>
                                            </div>
                                            <div class="form-group col">
                                                <label for="username">relative_contact</label>
                                                <input type="text" class="form-control" name="relative_contact" placeholder="Enter Next of kin contact" required>
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                                <label for="username">status</label>
                                                <select name="status" class="form-control">
                                                    <option value="#">Select the status</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Declined">Declined</option>
                                                </select>
                                            </div>
                                        
                                       
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="counselor_btn">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo $_SESSION['status'];
                        unset($_SESSION['status']);
                    } ?>
                    <?php $counselor = $dbh->query("SELECT * FROM counselor ");
                    if ($counselor->rowCount() > 0) { ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <!-- id`, `name`, `national_id`, `qualifications`, `contact`, `address`, `nationality`, `next_of_kin`, `relative_contact`, `status` -->
                            <thead>
                                <tr>
                                    <th>Couselor Name</th>
                                    <th>Qualification</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Nationality</th>
                                    <th>Next Of Keen</th>
                                    <th>Relative Contact</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rx = $counselor->fetch(PDO::FETCH_OBJ)) { ?>
                                    <tr>
                                        <td><?= $rx->name ?></td>
                                        <td><?=$rx->qualifications; ?></td>
                                        <td><?=$rx->contact; ?></td>
                                        <td><?= $rx->address ?></td>
                                        <td><?= $rx->nationality ?></td>
                                        <td><?= $rx->next_of_kin ?></td>
                                        <td><?= $rx->relative_contact ?></td>
                                        <td><?= $rx->status ?></td>
                                        <td>
                                            <a onclick="return confirm('Do you want to delete this user?');" href="?del-couselor=<?= $rx->counselor_id ?>" class="btn btn-danger">Delete</a>
                                            <button class="btn btn-primary" type="button" class="btn btn-default" data-toggle="modal" data-target="#edit<?= $rx->counselor_id ?>">
                                                Update
                                            </button>
                                            <button class="btn btn-success" type="button" class="btn btn-default" data-toggle="modal" data-target="#view<?= $rx->counselor_id ?>">
                                                View
                                            </button>
                                        </td>
                                    </tr>

                                <?php
                                    include 'view_counselor.php';
                                    include 'edit-counselor.php';
                                }
                                ?>
                            </tbody>
                        </table>

                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-12 alert alert-danger text-center">
                                No Career Added Yet !
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php' ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });



    // Your JavaScript code goes here
    $(function() {
        // Code for Toast and Toastr initialization
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        // Event handlers for different actions
        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultInfo').click(function() {
            Toast.fire({
                icon: 'info',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultError').click(function() {
            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultWarning').click(function() {
            Toast.fire({
                icon: 'warning',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultQuestion').click(function() {
            Toast.fire({
                icon: 'question',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
        });

        $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
        });

        // Repeat similar patterns for other actions
    });
</script>


</body>

</html>