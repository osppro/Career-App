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
                            Add Subject
                        </button>
                    </div>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Subject</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="">
                                        <div class="form-group col-md-12">
                                            <label for="username">Subject</label>
                                            <input type="text" class="form-control" name="subject" placeholder="Enter Subject Name" required>
                                        </div>
                                        <div class="form-group col">
                                                <label for="username">status</label>
                                                <select name="status" class="form-control">
                                                    <option value="#">Select the status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="subject_btn">Save changes</button>
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
                    <?php $subject = $dbh->query("SELECT * FROM subject ");
                    if ($subject->rowCount() > 0) { ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <!-- `userid`, `username`, `phone`, `password`, `u_status`, `role`, `date_registered` -->
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rx = $subject->fetch(PDO::FETCH_OBJ)) { ?>
                                    <tr>
                                        <td><?= $rx->subject ?></td>
                                        <td><?= $rx->status ?></td>
                                        <td>
                                            <a onclick="return confirm('Do you want to delete this user?');" href="?del-subject=<?= $rx->id ?>" class="btn btn-danger">Delete</a>
                                          
                                        </td>
                                    </tr>

                                <?php
                                  
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