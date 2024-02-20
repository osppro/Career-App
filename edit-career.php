<div class="modal fade" id="edit<?= $rx->career_id ?>">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Career</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="">
                                        <div class="form-group col-md-12">
                                            <label for="username">Career Name</label>
                                            <input type="text" class="form-control" value="<?=$rx->car_name ?>" name="car_name" placeholder="Enter Career Name" required>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group  col">
                                                <label for="phone">Description</label>
                                                <textarea class="form-control" name="car_desc"  rows="2" required> <?=$rx->car_desc ?></textarea>
                                               
                                            </div>
                                            <div class="form-group col">
                                                <label for="phone">Eligability</label>
                                                <textarea class="form-control"  name="eligability" rows="2" required> <?=$rx->eligability ?></textarea>
                                               
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="phone">Types of Jobs</label>
                                                <textarea class="form-control"  name="jobs"  rows="2" required> <?=$rx->jobs ?></textarea>
                                               
                                            </div>
                                            <div class="form-group col">
                                                <label for="phone">Employment opportunities</label>
                                                <textarea class="form-control"  name="opportunities"  rows="2" required><?=$rx->opportunities ?></textarea>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Recruiters</label>
                                            <textarea class="form-control" name="recuiters" rows="2" required> <?=$rx->recuiters ?></textarea>
                                           
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="update_career_btn">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>