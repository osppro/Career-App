<?php include 'header.php';?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="col-md-12">    
                        <div class="card-body">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                Add Student
                            </button>
                        </div>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Student</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="username">User Name:</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your full name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number:</label>
                                            <input type="number" class="form-control" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Password:</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role:</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="" disabled selected>Select your role</option>
                                                <option value="Student">Student</option>
                                                <option value="Counselor">Counselor</option>
                                                <option value="Career">Career</option>
                                                <option value="Unique Vistor">Unique Vistor</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_registered">Date Registered:</label>
                                            <input type="date" class="form-control" name="date_registered" placeholder="Enter the date registered">
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
                    <table id="example1" class="table table-bordered table-striped">
                        <!-- `userid`, `username`, `phone`, `password`, `u_status`, `role`, `date_registered` -->
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Date Registered</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $role = "student"; // Specify the role you want to fetch

                                $result = $dbh->prepare("SELECT * FROM users WHERE role = :role ORDER BY userid DESC");
                                $result->bindParam(':role', $role);
                                $result->execute();

                                while($rows = $result->fetch(PDO::FETCH_OBJ)){ ?>
                                    <tr>
                                        <td><?=$rows->username ?></td>
                                        <td><?=$rows->phone ?></td>
                                        <td><?=$rows->date_registered ?></td>
                                        <td>
                                            <a onclick="return confirm('Do you want to delete this user?');" href="?del-user=<?=$rows->userid?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } 
                             ?>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'?>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print",  "colvis"]

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
    $(function () {
        // Code for Toast and Toastr initialization
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        // Event handlers for different actions
        $('.swalDefaultSuccess').click(function () {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultInfo').click(function () {
            Toast.fire({
                icon: 'info',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultError').click(function () {
            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultWarning').click(function () {
            Toast.fire({
                icon: 'warning',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.swalDefaultQuestion').click(function () {
            Toast.fire({
                icon: 'question',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            });
        });

        $('.toastrDefaultSuccess').click(function () {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
        });

        $('.toastrDefaultInfo').click(function () {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
        });

        // Repeat similar patterns for other actions
    });

</script>


</body>
</html>