<div class="modal fade" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete LDK</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Are you sure want to delete this data ?</div>
            <div class="modal-footer">
                <form id="deleteForm" action="#" method="post">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function showModalDelete(id){
        document.getElementById('deleteForm').action = `/ldk/destroy/${id}`;
    }    
</script>