<div class="modal fade" id="view<?= $rx->counselor_id ?>">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Couselor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                 <p>   Career Name : <?=$rx->car_name ?></p>
                </div>
                <div class="mb-2">
                 <p>   National ID : <?=$rx->national_id ?></p>
                </div>
                <div class="mb-2">
                 <p>   Nationality : <?=$rx->nationality ?></p>
                </div>
                <div class="mb-2">
                 <p>   Qualifications : <?=$rx->qualifications ?></p>
                </div>
                <div class="mb-2">
                 <p>   Contact : <?=$rx->contact ?></p>
                </div>
                <div class="mb-2">
                 <p>   Address : <?=$rx->address ?></p>
                </div>
                <div class="mb-2">
                 <p>   Next of kin : <?=$rx->next_of_kin ?></p>
                </div>
                
                <div class="mb-2">
                 <p>   Next of kin Contact : <?=$rx->relative_contact ?></p>
                </div>
                
                <div class="mb-2">
                 <p>   Status : <?=$rx->status ?></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>