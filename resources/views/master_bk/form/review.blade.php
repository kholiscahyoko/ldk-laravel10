<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="reviewForm" action="/master_bk/reject" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Review Master Bahan Kimia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="review_material_number">Material Number <span class="text-danger">*</span>
                            </label>
                            <div>
                                <input type="text" class="form-control" id="review_material_number" name="material_number" placeholder="Enter material number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Approve / Reject <span class="text-danger">*</span>
                            </label>
                            <div>
                                <label for="" class="radio-inline mr-3">
                                    <input type="radio" name="approve_reject" id="review_approve" value="approve" required> Approve
                                </label>
                                <label for="" class="radio-inline mr-3">
                                    <input type="radio" name="approve_reject" id="review_reject" value="reject" required> Reject
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="review_row_comment">
                        <div class="form-group col-12">
                            <label>Comment <span class="text-danger">*</span>
                            </label>
                            <div>
                                <textarea name="comment" id="review_comment" cols="30" rows="3" class="form-control" placeholder="Enter comment if reject"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="review_row_ldk">
                        <div class="col-12">
                            <label> Bahan Kimia will be set approved if LDK is created
                            </label>
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createLdkModal" onclick="document.getElementById('ldk_material_number').value = document.getElementById('review_material_number').value;">Create LDK Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('review_approve').addEventListener('change', function(){
        if(this.checked){
            document.getElementById('review_row_comment').classList.add("d-none");
            document.getElementById('review_row_ldk').classList.remove("d-none");
            document.getElementById('review_comment').required = false;
        }
    });
    document.getElementById('review_reject').addEventListener('change', function(){
        if(this.checked){
            document.getElementById('review_row_comment').classList.remove("d-none");
            document.getElementById('review_row_ldk').classList.add("d-none");
            document.getElementById('review_comment').required = true;
        }
    });
</script>