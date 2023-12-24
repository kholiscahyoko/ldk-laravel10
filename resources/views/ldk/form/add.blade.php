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
                            <div>
                                <input type="text" class="form-control" id="material_number" name="material_number" placeholder="Enter material number" required>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="material_number">LDK Number <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="ldk_number" name="ldk_number" placeholder="Enter LDK number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="revision_number">Revision Number <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="revision_number" name="revision_number" placeholder="Enter revision number" required>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="composition">Composition</label>
                            <div>
                                <input type="text" class="form-control" id="composition" name="composition" placeholder="Enter composition">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="reactivity">Reactivity</label>
                            <div>
                                <input type="text" class="form-control" id="reactivity" name="reactivity" placeholder="Enter reactivity">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="hazard_identification">Hazard Identification</label>
                            <div>
                                <textarea  class="form-control" id="hazard_identification" name="hazard_identification" cols="20" rows="3" placeholder="Enter Hazard identification"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="melting_point">Melting Point</label>
                            <div>
                                <input type="text" class="form-control" id="melting_point" name="melting_point" placeholder="Enter melting point">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="characteristic">Characteristic <span class="text-danger">*</span></label>
                            <small>(Hold Shift for Multiple)</small>
                            <div>
                                <select multiple="multiple" class="form-control" name="characteristic[]" id="characteristic" required></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="colour">Colour</label>
                            <div>
                                <input type="text" class="form-control" id="colour" name="colour" placeholder="Enter colour">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="odour">Odour</label>
                            <div>
                                <input type="text" class="form-control" id="odour" name="odour" placeholder="Enter odour">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="physical_state">Physical State</label>
                            <div>
                                <input type="text" class="form-control" id="physical_state" name="physical_state" placeholder="Enter physical state">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="ph">pH</label>
                            <div>
                                <input type="text" class="form-control" id="ph" name="ph" placeholder="Enter pH">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="melting_point">Melting Point</label>
                            <div>
                                <input type="text" class="form-control" id="melting_point" name="melting_point" placeholder="Enter melting_point">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="lfl">LFL</label>
                            <div>
                                <input type="text" class="form-control" id="lfl" name="lfl" placeholder="Enter LFL">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="ufl">UFL</label>
                            <div>
                                <input type="text" class="form-control" id="ufl" name="ufl" placeholder="Enter UFL">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="p3k_eye">P3K Eye</label>
                            <div>
                                <input type="text" class="form-control" id="p3k_eye" name="p3k_eye" placeholder="Enter P3K Eye">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="p3k_skin">P3K Skin</label>
                            <div>
                                <input type="text" class="form-control" id="p3k_skin" name="p3k_skin" placeholder="Enter P3K Skin">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="p3k_ingestion">P3K Ingestion</label>
                            <div>
                                <input type="text" class="form-control" id="p3k_ingestion" name="p3k_ingestion" placeholder="Enter P3K Ingestion">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="p3k_inhalation">P3K Inhalation</label>
                            <div>
                                <input type="text" class="form-control" id="p3k_inhalation" name="p3k_inhalation" placeholder="Enter P3K Inhalation">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="p3k_others">P3K Others</label>
                            <div>
                                <textarea class="form-control" name="p3k_others" id="p3k_others" cols="30" rows="3" placeholder="Enter P3K Others"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="handling_storage">Handling Storage</label>
                            <div>
                                <input type="text" class="form-control" id="handling_storage" name="handling_storage" placeholder="Enter Handling Storage">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="spill_leakage">Spill Leakage</label>
                            <div>
                                <input type="text" class="form-control" id="spill_leakage" name="spill_leakage" placeholder="Enter Spill Leakage">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="disposal">Disposal</label>
                            <div>
                                <input type="text" class="form-control" id="disposal" name="disposal" placeholder="Enter Disposal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="ecology_info">Ecology Info</label>
                            <div>
                                <input type="text" class="form-control" id="ecology_info" name="ecology_info" placeholder="Enter Ecology Info">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="toxicology_info">Toxicology Info</label>
                            <div>
                                <input type="text" class="form-control" id="toxicology_info" name="toxicology_info" placeholder="Enter Toxicology Info">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="regulation">Regulation</label>
                            <div>
                                <input type="text" class="form-control" id="regulation" name="regulation" placeholder="Enter Regulation">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="shipping">Shipping</label>
                            <div>
                                <input type="text" class="form-control" id="shipping" name="shipping" placeholder="Enter Shipping">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="others_info">Others Info</label>
                            <div>
                                <textarea class="form-control" name="others_info" id="others_info" cols="30" rows="3" placeholder="Enter Others Info"></textarea>
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