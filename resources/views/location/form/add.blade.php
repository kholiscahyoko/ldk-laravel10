<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="createForm" action="/location/store" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Location</h5>
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
                        <label class="col-lg-4 col-form-label" for="plant">Plant Location <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <select name="plant" id="plant" class="form-control">
                                <option>Select Plant</option>
                                <option value="Plant Sunter">Plant Sunter</option>
                                <option value="Plant Pegangsaan">Plant Pegangsaan</option>
                                <option value="Plant Cikarang">Plant Cikarang</option>
                                <option value="Plant Karawang">Plant Karawang</option>
                                <option value="Plant Deltamas">Plant Deltamas</option>
                                <option value="DMD Cikarang">DMD Cikarang</option>
                                <option value="SRTC Deltamas">SRTC Deltamas</option>
                                <option value="TSD Pulogadung">TSD Pulogadung</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="location">Section Location <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <select name="location" id="location" class="form-control">
                                <option>Select Section</option>
                                <option value="waho">WAHO</option>
                                <option value="melting">MELTING</option>
                                <option value="engineering">ENGINEERING</option>
                                <option value="welding">WELDING</option>
                                <option value="machining">MACHINING</option>
                                <option value="put">PUT</option>
                                <option value="pc">PC</option>
                                <option value="tsd">TSD</option>
                                <option value="obm">OBM</option>
                                <option value="fpr">FPR</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="other_location">Other Location
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="other_location" name="other_location" placeholder="Enter location" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="uom">UOM <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="uom" name="uom" placeholder="Enter uom" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="qty">Quantity <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter quantity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="pic_nrp">PIC NRP <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="pic_nrp" name="pic_nrp" placeholder="Enter PIC NRP" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="pic_name">PIC Name <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="pic_name" name="pic_name" placeholder="Enter PIC Name" required>
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
    document.getElementById('location').addEventListener("change", function(e){
        if(this.value === "other"){
            document.getElementById("other_location").disabled = false;
            document.getElementById("other_location").required = true;
        }else{
            document.getElementById("other_location").disabled = true;
            document.getElementById("other_location").required = false;
        }
    });
</script>