<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="col-6 mx-auto">
        <div class="bg-dark text-light px-4 py-2">
            <div class="">
                <h1 class="text-center">Student Management</h1>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commonModal">+
                        Student</button>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="commonModal" tabindex="-1" aria-labelledby="commonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="commonModalLabel">Create Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
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
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
