<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="commonModalLabel">Create Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6 p-2">
                    <label for="">First Name:</label>
                    <input type="text" name="first_name" id="" class="form-control"
                           placeholder="First Name">
                </div>
                <div class="col-6 p-2">
                    <label for="">Last Name:</label>
                    <input type="text" name="last_name" id="" class="form-control"
                           placeholder="Last Name">
                </div>
                <div class="col-6 p-2">
                    <label for="">Gender:</label>
                    <div class="d-flex">
                        <div class="me-2">
                            <input type="radio" name="gender" id="male" value="male">
                            <label for="male">Male</label>
                        </div>
                        <div class="me-2">
                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-2">
                    <label for="">Course:</label>
                    <select name="course" id="" class="form-select">
                        <option value="JAVA">JAVA</option>
                        <option value="PHP">PHP</option>
                        <option value="Python">Python</option>
                    </select>
                </div>
                <div class="col-12 p-2">
                    <label for="">Phone Number:</label>
                    <input type="text" name="phone_number" id="" class="form-control"
                           placeholder="Phone Number">
                </div>
                <div class="col-12 p-2">
                    <label for="">Profile:</label>
                    <input type="file" name="profile" id="" class="form-control"
                           placeholder="Phone Number">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>
