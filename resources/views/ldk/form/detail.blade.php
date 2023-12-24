<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">LDK Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <strong class="card-title">Material Number</strong>
                        <div class="card-content">
                            <p class="text-justify" id="detail_material_number"></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <strong class="card-title">LDK Number</strong>
                        <div class="card-content">
                            <p class="text-justify" id="detail_ldk_number"></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <strong class="card-title">Revision Number</strong>
                        <div class="card-content">
                            <p class="text-justify" id="detail_revision_number"></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <strong class="card-title">Composition</strong>
                        <div class="card-content">
                            <p class="text-justify" id="detail_composition"></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <strong class="card-title">Characteristic</strong>
                        <div class="card-content">
                            <div class="media" id="detail_characteristic"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>

    function createImg(url){

    }
    function showModalDetail(id){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/ldk/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var data = responseData.data;
                console.log(data);

                document.getElementById('detail_material_number').innerHTML = data.master_bk.material_number;
                document.getElementById('detail_ldk_number').innerHTML = data.ldk_number;
                document.getElementById('detail_revision_number').innerHTML = data.revision_number;
                document.getElementById('detail_composition').innerHTML = data.composition;
                detail_characteristic = document.getElementById('detail_characteristic');
                detail_characteristic.innerHTML = "";
                for (let i = 0; i < data.characteristic.length; i++) {
                    let img = new Image();
                    img.setAttribute('class', "img-thumbnail");
                    img.style = "max-width:100px;";
                    img.src = `/storage/${data.characteristic[i].pictogram}`;
                    detail_characteristic.appendChild(img);
                }
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }    
    // function getCharacteristics(){
    //     var xhr = new XMLHttpRequest();

    //     xhr.open('GET', '/characteristic/all', true);
    //     xhr.onreadystatechange = function () {
    //         if (xhr.readyState === 4 && xhr.status === 200) {
    //             // Parse the JSON response
    //             var responseData = JSON.parse(xhr.responseText);

    //             // Access the user data
    //             var data = responseData.data;

    //             var select = document.getElementById('characteristic');
    //             for (let i = 0; i < data.length; i++) {
    //                 var option = document.createElement('option');
    //                 option.value = data[i].id;
    //                 option.text = data[i].characteristic_name;
    //                 select.add(option);
    //             }
                
    //         } else if (xhr.readyState === 4) {
    //             // Handle errors or other status codes
    //             console.error(xhr.status, xhr.statusText);
    //         }
    //     };

    //     xhr.send();
    // }
    // getCharacteristics();
</script>