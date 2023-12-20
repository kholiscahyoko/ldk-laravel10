<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="createForm" action="/master_bk/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Master Bahan Kimia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="material_number">Material Number <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="material_number" name="material_number" placeholder="Enter material number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="material_desc">Material Description <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="material_desc" name="material_desc" placeholder="Enter material description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="maker">Maker <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="maker" name="maker" placeholder="Enter a maker name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="ldk_fr_maker">LDK from Maker <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="ldk_fr_maker" name="ldk_fr_maker" accept="application/pdf" placeholder="Input LDK Document" required>
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