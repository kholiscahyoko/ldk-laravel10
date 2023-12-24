<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="editForm" action="/ldk/update" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit LDK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_material_number">Material Number <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="edit_material_number" name="material_number" placeholder="Enter material number" required>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_material_number">LDK Number <span class="text-danger">*</span></label>
                            <div>
                                <input type="text" class="form-control" id="edit_ldk_number" name="ldk_number" placeholder="Enter LDK number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_revision_number">Revision Number <span class="text-danger">*</span></label>
                            <div>
                                <input type="number" class="form-control" id="edit_revision_number" name="revision_number" placeholder="Enter revision number" required>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_composition">Composition</label>
                            <div>
                                <input type="text" class="form-control" id="edit_composition" name="composition" placeholder="Enter composition">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_reactivity">Reactivity</label>
                            <div>
                                <input type="text" class="form-control" id="edit_reactivity" name="reactivity" placeholder="Enter reactivity">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_hazard_identification">Hazard Identification</label>
                            <div>
                                <textarea  class="form-control" id="edit_hazard_identification" name="hazard_identification" cols="20" rows="3" placeholder="Enter Hazard identification"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_melting_point">Melting Point</label>
                            <div>
                                <input type="text" class="form-control" id="edit_melting_point" name="melting_point" placeholder="Enter melting point">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_characteristic">Characteristic <span class="text-danger">*</span></label>
                            <small>(Hold Shift for Multiple)</small>
                            <div>
                                <select multiple="multiple" class="form-control" name="characteristic[]" id="edit_characteristic" required></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_colour">Colour</label>
                            <div>
                                <input type="text" class="form-control" id="edit_colour" name="colour" placeholder="Enter colour">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_odour">Odour</label>
                            <div>
                                <input type="text" class="form-control" id="edit_odour" name="odour" placeholder="Enter odour">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_physical_state">Physical State</label>
                            <div>
                                <input type="text" class="form-control" id="edit_physical_state" name="physical_state" placeholder="Enter physical state">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_ph">pH</label>
                            <div>
                                <input type="text" class="form-control" id="edit_ph" name="ph" placeholder="Enter pH">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_melting_point">Melting Point</label>
                            <div>
                                <input type="text" class="form-control" id="edit_melting_point" name="melting_point" placeholder="Enter melting_point">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_lfl">LFL</label>
                            <div>
                                <input type="text" class="form-control" id="edit_lfl" name="lfl" placeholder="Enter LFL">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_ufl">UFL</label>
                            <div>
                                <input type="text" class="form-control" id="edit_ufl" name="ufl" placeholder="Enter UFL">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_p3k_eye">P3K Eye</label>
                            <div>
                                <input type="text" class="form-control" id="edit_p3k_eye" name="p3k_eye" placeholder="Enter P3K Eye">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_p3k_skin">P3K Skin</label>
                            <div>
                                <input type="text" class="form-control" id="edit_p3k_skin" name="p3k_skin" placeholder="Enter P3K Skin">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_p3k_ingestion">P3K Ingestion</label>
                            <div>
                                <input type="text" class="form-control" id="edit_p3k_ingestion" name="p3k_ingestion" placeholder="Enter P3K Ingestion">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_p3k_inhalation">P3K Inhalation</label>
                            <div>
                                <input type="text" class="form-control" id="edit_p3k_inhalation" name="p3k_inhalation" placeholder="Enter P3K Inhalation">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_p3k_others">P3K Others</label>
                            <div>
                                <textarea class="form-control" name="p3k_others" id="edit_p3k_others" cols="30" rows="3" placeholder="Enter P3K Others"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_handling_storage">Handling Storage</label>
                            <div>
                                <input type="text" class="form-control" id="edit_handling_storage" name="handling_storage" placeholder="Enter Handling Storage">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_spill_leakage">Spill Leakage</label>
                            <div>
                                <input type="text" class="form-control" id="edit_spill_leakage" name="spill_leakage" placeholder="Enter Spill Leakage">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_disposal">Disposal</label>
                            <div>
                                <input type="text" class="form-control" id="edit_disposal" name="disposal" placeholder="Enter Disposal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_ecology_info">Ecology Info</label>
                            <div>
                                <input type="text" class="form-control" id="edit_ecology_info" name="ecology_info" placeholder="Enter Ecology Info">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_toxicology_info">Toxicology Info</label>
                            <div>
                                <input type="text" class="form-control" id="edit_toxicology_info" name="toxicology_info" placeholder="Enter Toxicology Info">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_regulation">Regulation</label>
                            <div>
                                <input type="text" class="form-control" id="edit_regulation" name="regulation" placeholder="Enter Regulation">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="edit_shipping">Shipping</label>
                            <div>
                                <input type="text" class="form-control" id="edit_shipping" name="shipping" placeholder="Enter Shipping">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="edit_others_info">Others Info</label>
                            <div>
                                <textarea class="form-control" name="others_info" id="edit_others_info" cols="30" rows="3" placeholder="Enter Others Info"></textarea>
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
    function getCharacteristicsEdit(){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/characteristic/all', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;

                var select = document.getElementById('edit_characteristic');
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
    getCharacteristicsEdit();
    function showModalEdit(id){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/ldk/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;
                console.log(data);

                document.getElementById('edit_material_number').value = data.master_bk.material_number;
                characteristic_options = Array.from(document.querySelectorAll("#edit_characteristic option"));
                for (let i = 0; i < data.characteristic.length; i++) {
                    characteristic_options.find(function(c){
                        return c.value == data.characteristic[i].id
                    }).selected = true;
                }
                document.getElementById('edit_ldk_number').value = data.ldk_number;
                document.getElementById('edit_revision_number').value = data.revision_number;
                document.getElementById('edit_composition').value = data.composition;
                document.getElementById('edit_reactivity').value = data.reactivity;
                document.getElementById('edit_hazard_identification').value = data.hazard_identification;
                document.getElementById('edit_physical_state').value = data.physical_state;
                document.getElementById('edit_colour').value = data.colour;
                document.getElementById('edit_odour').value = data.odour;
                document.getElementById('edit_ph').value = data.ph;
                document.getElementById('edit_melting_point').value = data.melting_point;
                document.getElementById('edit_lfl').value = data.lfl;
                document.getElementById('edit_ufl').value = data.ufl;
                document.getElementById('edit_p3k_eye').value = data.p3k_eye;
                document.getElementById('edit_p3k_skin').value = data.p3k_skin;
                document.getElementById('edit_p3k_ingestion').value = data.p3k_ingestion;
                document.getElementById('edit_p3k_inhalation').value = data.p3k_inhalation;
                document.getElementById('edit_p3k_others').value = data.p3k_others;
                document.getElementById('edit_handling_storage').value = data.handling_storage;
                document.getElementById('edit_spill_leakage').value = data.spill_leakage;
                document.getElementById('edit_disposal').value = data.disposal;
                document.getElementById('edit_ecology_info').value = data.ecology_info;
                document.getElementById('edit_toxicology_info').value = data.toxicology_info;
                document.getElementById('edit_regulation').value = data.regulation;
                document.getElementById('edit_shipping').value = data.shipping;
                document.getElementById('edit_others_info').value = data.others_info;

                document.getElementById('editForm').action = `/ldk/update/${data.id}`;
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }
</script>