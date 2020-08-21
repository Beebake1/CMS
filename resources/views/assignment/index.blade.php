@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Assignments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assignments</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Assignments</h5>
              </div>
              <div class="card-body">
                  <div class="card-header">
                    <a href="{{ route('assignments.create') }}" class="btn btn-primary">+ Add Assignments</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignments as $assignment)
                        <tr>
                            <td>{{ $assignment->id }}</td>
                            <td>{{ $assignment->title }}</td>
                            <td>{{ $assignment->description }}</td>
                            <td>{{ $assignment->courses->title }}</td>
                            <td>
                                <div class="row">
                                <a href="{{ route('assignments.edit',$assignment->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp; <a href="{{ route('assignments.show',$assignment->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>&nbsp;<form action="{{ route('assignments.destroy',$assignment->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
  </div>
  @endsection
