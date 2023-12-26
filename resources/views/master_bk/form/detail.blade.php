<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Bahan Kimia Detail</h5>
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
                        <h5>Material Desc</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_material_desc"></p>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <h5>Maker</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_maker"></p>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h5>LDK from Maker</h5>
                        <div class="card-content">
                            <div id="detail_ldk_fr_maker">

                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h5>Status</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_status_bk"></p>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <h5>Comment</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_comment"></p>
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
        </div>
    </div>
</div>
<script>
    function showModalDetail(id){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/master_bk/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;
                console.log(data);

                document.getElementById('detail_material_number').innerHTML = data.material_number ?? "Not Set";
                document.getElementById('detail_material_desc').innerHTML = data.material_desc ?? "Not Set";
                document.getElementById('detail_maker').innerHTML = data.maker ?? "Not Set";
                document.getElementById('detail_ldk_fr_maker').innerHTML = `<a class="badge badge-primary p-2" href="/storage/${data.ldk_fr_maker}" target="_blank" id="detail_ldk_fr_maker">Show LDK</a>` ?? `<p class="text-justify" id="detail_updated_by">Not Set</p>`;
                document.getElementById('detail_status_bk').innerHTML = (data.status_bk === "0") ? 'Need Review' : (data.status_bk === "1") ? 'Rejected' : (data.status_bk === "2") ? 'Active' : 'Unknown';
                document.getElementById('detail_comment').innerHTML = data.comment ?? "Not Set";
                document.getElementById('detail_created_by').innerHTML = data.created_by?.name ?? "Not Set";
                document.getElementById('detail_created_at').innerHTML = convertToLongDate(data.created_at) ?? "Not Set";
                document.getElementById('detail_updated_by').innerHTML = data.updated_by?.name ?? "Not Set";
                document.getElementById('detail_updated_at').innerHTML = convertToLongDate(data.updated_at) ?? "Not Set";
                @canany(['manage-master-bk'])
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