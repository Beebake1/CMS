@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Students</h5>
              </div>
              <div class="card-body">
                  <div class="card-header">
                    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
                  </div>
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->course->title }}</td>
                            <td>
                                <div class="row">
                                <a href="{{ route('students.edit',$student->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp; <a href="{{ route('students.show',$student->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>&nbsp;<form action="{{ route('students.destroy',$student->id) }}" method="POST">
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
