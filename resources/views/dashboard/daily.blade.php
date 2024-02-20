@extends('dashboard.layouts.main')
@section('title', 'Daily Task')
@section('daily-task', 'active')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daily Task</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daily Task</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daily Task</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                        Create
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Supervisor</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($daily_tasks as $daily_task)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $daily_task->name }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $daily_task->start_date)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $daily_task->end_date)->format('d/m/Y') }}</td>
                                            <td>{{ $daily_task->superior_name }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Transaction Actions">
                                                    <form action="{{ route('daily_task.update', ['daily_task' => $daily_task->id]) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $daily_task->id }}">
                                                            Edit
                                                        </button>
                                                    </form>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{ $daily_task->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $daily_task->id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel{{ $daily_task->id }}">Edit Daily Task</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('daily_task.update', ['daily_task' => $daily_task->id]) }}" method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="edit_name">Name</label>
                                                                            <input type="text" class="form-control" id="edit_name" name="name" value="{{ $daily_task->name }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="edit_start_date">Start Date</label>
                                                                            <input type="date" class="form-control" id="edit_start_date" name="start_date" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $daily_task->start_date)->format('Y-m-d') }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="edit_end_date">End Date</label>
                                                                            <input type="date" class="form-control" id="edit_end_date" name="end_date" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $daily_task->end_date)->format('Y-m-d') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form action="{{ route('daily_task.delete', ['daily' => $daily_task->id]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-warning">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Daily Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('daily_task.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
