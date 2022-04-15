<div class="modal fade" id="edit_users" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="pointsTitle">+Add User</h5>
                <button type="button" id="close_points" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.edit.user', $data->id )}}" method="get">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $data->email }}" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">old Password</label>
                        <input class="form-control"  type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">new  Password</label>
                        <input class="form-control"  type="password" name="confirm_password" id="confirm_password">
                    </div>
                </div>
                <div>
                    <button style="float: center" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
