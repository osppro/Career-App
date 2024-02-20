<?php include 'header.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php $totalstd = $dbh->query("SELECT * FROM users WHERE role ='student' "); ?>
                            <h3><?=number_format($totalstd->rowCount());?></h3>
                            <p>Total Student</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="student" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                    <div class="inner">
                            <?php $totalcl = $dbh->query("SELECT * FROM users WHERE role ='Counselor' "); ?>
                            <h3><?=number_format($totalcl->rowCount());?></h3>
                            <p>Counselor</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="counselor" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php $totalcrs = $dbh->query("SELECT * FROM users WHERE role ='Career' "); ?>
                            <h3><?=number_format($totalcrs->rowCount());?></h3>
                            <p>Careers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="career" class="small-box-footer">List All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php $totaluqvit = $dbh->query("SELECT * FROM users WHERE role ='Admin' "); ?>
                            <h3><?=number_format($totaluqvit->rowCount());?></h3>
                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>