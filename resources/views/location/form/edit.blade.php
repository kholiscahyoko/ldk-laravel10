<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="editForm" action="/location/update" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Location</h5>
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
                        <label class="col-lg-4 col-form-label" for="edit_location">Location <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_location" name="location" placeholder="Enter material location" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_uom">UOM <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_uom" name="uom" placeholder="Enter uom" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_qty">Quantity <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="number" class="form-control" id="edit_qty" name="qty" placeholder="Enter quantity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_pic_nrp">PIC NRP <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_pic_nrp" name="pic_nrp" placeholder="Enter PIC NRP" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_pic_name">PIC Name <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_pic_name" name="pic_name" placeholder="Enter PIC Name" required>
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

        xhr.open('GET', '/location/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;

                document.getElementById('edit_material_number').value = data.master_bk.material_number;
                document.getElementById('edit_location').value = data.location;
                document.getElementById('edit_uom').value = data.uom;
                document.getElementById('edit_qty').value = data.qty;
                document.getElementById('edit_pic_nrp').value = data.pic_nrp;
                document.getElementById('edit_pic_name').value = data.pic_name;
                document.getElementById('editForm').action = `/location/update/${data.id}`;
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }
</script>