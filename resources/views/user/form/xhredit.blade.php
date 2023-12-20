<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-valide" id="createUserForm" action="/user/store" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your valid email.." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="password">Password <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one.." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="..and confirm it!" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="role">Role <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6">
                            <select class="form-control" id="role" name="role" required>
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
                        <label class="col-lg-4 col-form-label" for="nrp">NRP
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="nrp" name="nrp" placeholder="Enter a NRP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="organization">Organization
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="organization" name="organization" placeholder="Enter an Organization">
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