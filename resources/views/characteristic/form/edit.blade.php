<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="editForm" action="/characteristic/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">edit Characteristic Bahan Kimia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_characteristic_name">Characteristic Name <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_characteristic_name" name="characteristic_name" placeholder="Enter characteristic name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_notes">Notes <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <textarea class="form-control" id="edit_notes" name="notes" placeholder="Enter notes"  cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_pictogram">Pictogram <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="edit_pictogram" name="pictogram" accept="image/png, image/jpeg" placeholder="Input Pictogram Image">
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
        xhr.open('GET', '/characteristic/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;
                console.log(data);

                document.getElementById('edit_characteristic_name').value = data.characteristic_name;
                document.getElementById('edit_notes').value = data.notes;
                document.getElementById('editForm').action = `/characteristic/update/${data.id}`;
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }
</script>