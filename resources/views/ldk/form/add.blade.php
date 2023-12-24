<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="createForm" action="/ldk/store" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create LDK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="material_number">Material Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="material_number" name="material_number" placeholder="Enter material number" required>
                        </div>
                        <div class="form-group col">
                            <label for="material_number">LDK Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ldk_number" name="ldk_number" placeholder="Enter LDK number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="revision_number">Revision Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="revision_number" name="revision_number" placeholder="Enter revision number" required>
                        </div>
                        <div class="form-group col">
                            <label for="composition">Composition <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="composition" name="composition" placeholder="Enter composition" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="hazard_identification">Hazard Identification <span class="text-danger">*</span></label>
                            <textarea  class="form-control" id="hazard_identification" name="hazard_identification" cols="20" rows="3" placeholder="Enter Hazard identification" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="melting_point">Melting Point <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="melting_point" name="melting_point" placeholder="Enter melting point" required>
                        </div>
                        <div class="form-group col">
                            <label for="characteristic">Characteristic <span class="text-danger">*</span></label>
                            <select multiple="multiple" class="form-control" name="characteristic[]" id="characteristic">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="colour">Colour <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="colour" name="colour" placeholder="Enter colour" required>
                        </div>
                        <div class="form-group col">
                            <label for="odour">Odour <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="odour" name="odour" placeholder="Enter odour" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="physical_state">Physical State <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="physical_state" name="physical_state" placeholder="Enter physical state" required>
                        </div>
                        <div class="form-group col">
                            <label for="ph">pH <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ph" name="ph" placeholder="Enter pH" required>
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
    function getCharacteristics(){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/characteristic/all', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;

                var select = document.getElementById('characteristic');
                for (let i = 0; i < data.length; i++) {
                    var option = document.createElement('option');
                    option.value = data[i].id;
                    option.text = data[i].characteristic_name;
                    select.add(option);
                }
                
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }
    getCharacteristics();
</script>