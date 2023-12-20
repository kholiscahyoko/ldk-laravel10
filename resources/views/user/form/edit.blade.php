<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-validate-edit" id="editUserForm" action="/user/update" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_name">Name <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_name" name="name" placeholder="Enter a name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_email">Email <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control" id="edit_email" name="email" placeholder="Your valid email.." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_role">Role <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <select class="form-control" id="edit_role" name="role" required>
                                <option value="">Please select</option>
                                <option value="super">Super Admin</option>
                                <option value="ehs">EHS</option>
                                <option value="purchasing">Purchasing</option>
                                <option value="waho">WAHO</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_nrp">NRP
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_nrp" name="nrp" placeholder="Enter a NRP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="edit_organization">Organization
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="edit_organization" name="organization" placeholder="Enter an Organization">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function showModalEdit(id){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', '/user/' + id, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the JSON response
                var responseData = JSON.parse(xhr.responseText);

                // Access the user data
                var user = responseData.user;
                console.log(user);

                document.getElementById('edit_name').value = user.name;
                document.getElementById('edit_email').value = user.email;
                document.getElementById('edit_role').value = user.role;
                document.getElementById('edit_nrp').value = user.nrp;
                document.getElementById('edit_organization').value = user.organization;
                document.getElementById('editUserForm').action = `/user/update/${user.id}`;
            } else if (xhr.readyState === 4) {
                // Handle errors or other status codes
                console.error(xhr.status, xhr.statusText);
            }
        };

        xhr.send();
    }

</script>