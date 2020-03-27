<!DOCTYPE html>
<html>
@include("layout/head")
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include("layout/nav")
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include("layout/main-sidebar")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Students</li>
                        </ol>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger px-3 py-1">
                            @foreach ($errors->all() as $error)
                                <h5 class="m-0">{{ $error }}</h5>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All students</h3>
                            <button class="btn btn-primary float-right px-4 py-2" data-toggle="modal"
                            data-target="#modal-new-student">Create new student</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-student" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($students as $stu)
                                <tr>
                                    <td data-target="id">{{ $stu->id }}</td>
                                    <td data-target="name">{{ $stu->name }}</td>
                                    <td data-target="age" class="ellipsis">{{ $stu->age }}</td>
                                    <td data-target="address" class="ellipsis">{{ $stu->address }}</td>
                                    <td data-target="telephone" class="ellipsis">{{ $stu->telephone }}</td>
                                    <td>{{ $stu->created_at }}</td>
                                    <td>{{ $stu->updated_at }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a data-toggle="modal" data-target="#modal-edit-student"><i class="far fa-edit"></i></a>
                                        <a data-toggle="modal" data-target="#modal-delete-student"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @empty
                                    <p>Không có cột</p>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="modal-new-student">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" action="{{ url('/create') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create new student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Student name</label>
                        <input name="name" class="form-control" placeholder="Enter student name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Student age</label>
                        <input name="age" class="form-control" placeholder="Enter student age" value="{{ old('age') }}">
                    </div>
                    <div class="form-group">
                        <label>Student address</label>
                        <input name="address" class="form-control" placeholder="Enter student address" value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <label>Student telephone</label>
                        <input name="telephone" class="form-control" placeholder="Enter student telephone" value="{{ old('telephone') }}">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-edit-student">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" action="{{ url('/edit') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Edit student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Student name</label>
                        <input name="name" class="form-control" placeholder="Enter student name">
                    </div>
                    <div class="form-group">
                        <label>Student age</label>
                        <input name="age" class="form-control" placeholder="Enter student age">
                    </div>
                    <div class="form-group">
                        <label>Student address</label>
                        <input name="address" class="form-control" placeholder="Enter student address">
                    </div>
                    <div class="form-group">
                        <label>Student telephone</label>
                        <input name="telephone" class="form-control" placeholder="Enter student telephone">
                    </div>
                    <input type="hidden" name="id">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-delete-student">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" action="{{ url('/delete') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Delete student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this student?
                    <input type="hidden" name="id">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @include("layout/footer")

    <!-- Control Sidebar -->
    @include("layout/sidebar")
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include("layout/scripts")
</body>
</html>
