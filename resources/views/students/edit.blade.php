<form action="{{route("update", $student->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <input type="text" name="old_profile" value="{{$student->profile}}" id="" class="form-control">
        <div class="col-6 p-2">
            <label for="">First Name:</label>
            <input type="text" name="first_name" value="{{$student->first_name}}" id="" class="form-control"
                   placeholder="First Name">
        </div>
        <div class="col-6 p-2">
            <label for="">Last Name:</label>
            <input type="text" name="last_name" id="" value="{{$student->last_name}}" class="form-control"
                   placeholder="Last Name">
        </div>
        <div class="col-6 p-2">
            <label for="">Gender:</label>
            <div class="d-flex">
                <div class="me-2">
                    <input type="radio" name="gender" {{$student->gender == "male" ? 'checked' : ''}} id="male" value="male">
                    <label for="male">Male</label>
                </div>
                <div class="me-2">
                    <input type="radio" name="gender" id="female" {{$student->gender == "female" ? 'checked' : ''}}  value="female">
                    <label for="female">Female</label>
                </div>
            </div>
        </div>
        <div class="col-6 p-2">
            <label for="">Course:</label>
            <select name="course" id="" class="form-select">
                <option value="JAVA" {{$student->course == "JAVA" ? 'selected' : ''}} >JAVA</option>
                <option value="PHP" {{$student->course == "PHP" ? 'selected' : ''}}>PHP</option>
                <option value="Python" {{$student->course == "Python" ? 'selected' : ''}}>Python</option>
            </select>
        </div>
        <div class="col-12 p-2">
            <label for="">Phone Number:</label>
            <input type="text" name="phone_number" id="" class="form-control"
                   placeholder="Phone Number" value="{{$student->phone}}"
            >
        </div>
        <div class="col-12 p-2">
            <label for="">Profile:</label>
            <input type="file" name="profile" id="" class="form-control">
            <img src="{{asset('images/'.$student->profile)}}" alt="" width="100px">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
