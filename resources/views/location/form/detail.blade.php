<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Location Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-around">
                    <div class="col-4 mb-2">
                        <h5 >Material Number</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_material_number"></p>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <h5>Material Location</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_location"></p>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <h5>UOM</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_uom"></p>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <h5>Quantity</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_qty"></p>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <h5>PIC NRP</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_pic_nrp"></p>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <h5>PIC Name</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_pic_name"></p>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h5>Created At</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_created_at"></p>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h5>Created By</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_created_by"></p>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h5>Updated At</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_updated_at"></p>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h5>Updated By</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_updated_by"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @canany(['manage-location'])
                <button id="btnEditDetail" type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#editModal" onclick="">Edit</button>
                @endcanany
            </div>
        </div>
    </div>
</div>
<script>
    function showModalDetail(id){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/location/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;
                console.log(data);

                document.getElementById('detail_material_number').innerHTML = data.master_bk.material_number ?? "Not Set";
                document.getElementById('detail_location').innerHTML = data.location ?? "Not Set";
                document.getElementById('detail_uom').innerHTML = data.uom ?? "Not Set";
                document.getElementById('detail_qty').innerHTML = data.qty ?? "Not Set";
                document.getElementById('detail_pic_nrp').innerHTML = data.pic_nrp ?? "Not Set";
                document.getElementById('detail_pic_name').innerHTML = data.pic_name ?? "Not Set";
                document.getElementById('detail_created_by').innerHTML = data.created_by?.name ?? "Not Set";
                document.getElementById('detail_created_at').innerHTML = convertToLongDate(data.created_at) ?? "Not Set";
                document.getElementById('detail_updated_by').innerHTML = data.updated_by?.name ?? "Not Set";
                document.getElementById('detail_updated_at').innerHTML = convertToLongDate(data.updated_at) ?? "Not Set";
                @canany(['manage-location'])
                document.getElementById('btnEditDetail').setAttribute('onclick', `showModalEdit(${id});`);
                @endcanany
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }
</script>