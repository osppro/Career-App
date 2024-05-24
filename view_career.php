<div class="modal fade" id="view<?= $rx->career_id ?>">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Career</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-2 text-center">
                 <h3>   Career Name : <?=$rx->car_name ?></h3>
                </div>
                <div class="mb-2 row g-3">
                    <div class="col-md-6 ">
                        <h5>Description</h5>
                        <p>
                        <?php
                    $recruitersText = $rx->car_desc;
                    $wrappedRecruitersText = wordwrap($recruitersText, 80, "<br>");
                    echo "<span>$wrappedRecruitersText</span>";
                    ?>
                </p>
                        
                    </div>
                    <div class="col-md-6 "> <h5>Eligibility</h5>
                    <p>
                        <?php
                    $recruitersText = $rx->eligability;
                    $wrappedRecruitersText = wordwrap($recruitersText, 80, "<br>");
                    echo "<span>$wrappedRecruitersText</span>";
                    ?>
                </p>
                       </div>
                </div>
                <div class="mb-2 row g-3">
                    <div class="col-md-6 ">
                        <h5>Types of Jobs</h5>
                        <p>
                        <?php
                    $recruitersText = $rx->jobs;
                    $wrappedRecruitersText = wordwrap($recruitersText, 80, "<br>");
                    echo "<span>$wrappedRecruitersText</span>";
                    ?>
                </p>
                    </div>
                    <div class="col-md-6 ">
                         <h5>Employment Opportunities</h5>
                    <p>
                <?php
                    $recruitersText = $rx->opportunities;
                    $wrappedRecruitersText = wordwrap($recruitersText, 80, "<br>");
                    echo "<span>$wrappedRecruitersText</span>";
                    ?>
                </p>
                    </div>
                </div>
                <div class="m-b2">
                <h5>Top Recruiters</h5>
                <p>
                <?php
                    $recruitersText = $rx->recuiters;
                    $wrappedRecruitersText = wordwrap($recruitersText, 80, "<br>");
                    echo "<span>$wrappedRecruitersText</span>";
                    ?>
                </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>