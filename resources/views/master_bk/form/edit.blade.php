<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="editForm" action="/master_bk/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Master Bahan Kimia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_material_number">Material Number <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_material_number" name="material_number" placeholder="Enter material number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_material_desc">Description <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_material_desc" name="material_desc" placeholder="Enter material description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_maker">Maker <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_maker" name="maker" placeholder="Enter a maker name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_ldk_fr_maker">LDK from Maker <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="edit_ldk_fr_maker" name="ldk_fr_maker" accept="application/pdf" placeholder="Input LDK Document">
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
    function showModalEdit(id){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/master_bk/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var master_bk = responseData.master_bk;
                console.log(master_bk);

                document.getElementById('edit_material_number').value = master_bk.material_number;
                document.getElementById('edit_material_desc').value = master_bk.material_desc;
                document.getElementById('edit_maker').value = master_bk.maker;
                document.getElementById('editForm').action = `/master_bk/update/${master_bk.id}`;
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }
</script>