<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Characteristic Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-around">
                    <div class="col-4 mb-2">
                        <h5 >Characteristic Name</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_characteristic_name"></p>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <h5>Pictogram</h5>
                        <div class="card-content">
                            <div class="media" id="detail_pictogram"></div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <h5>Notes</h5>
                        <div class="card-content">
                            <p class="text-justify" id="detail_notes"></p>
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
                <button id="btnEditDetail" type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#editModal" onclick="">Edit</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showModalDetail(id){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/characteristic/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;
                console.log(data);

                detail_pictogram = document.getElementById('detail_pictogram');
                detail_pictogram.innerHTML = "";
                let img = new Image();
                img.setAttribute('class', "img-thumbnail col");
                img.style = "max-width:100px;";
                img.src = `/storage/${data.pictogram}`;
                detail_pictogram.appendChild(img);

                document.getElementById('detail_characteristic_name').innerHTML = data.characteristic_name ?? "Not Set";
                document.getElementById('detail_notes').innerHTML = data.notes ?? "Not Set";
                document.getElementById('detail_created_by').innerHTML = data.created_by?.name ?? "Not Set";
                document.getElementById('detail_created_at').innerHTML = convertToLongDate(data.created_at) ?? "Not Set";
                document.getElementById('detail_updated_by').innerHTML = data.updated_by?.name ?? "Not Set";
                document.getElementById('detail_updated_at').innerHTML = convertToLongDate(data.updated_at) ?? "Not Set";
                document.getElementById('btnEditDetail').setAttribute('onclick', `showModalEdit(${id});`);
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }
</script>