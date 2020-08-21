@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Assignment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Assignment</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Show Assignment
            </div>

            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('assignments.index') }}">
                            Back to List
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <td>
                                    {{ $assignment->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Title
                                </th>
                                <td>
                                    {{ $assignment->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Description
                                </th>
                                <td>
                                    {{ $assignment->description }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Course
                                </th>
                                <td>
                                    {{ $assignment->courses->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Student
                                </th>
                                <td>
                                    @foreach($assignment->courses->students as $student)
                                    <span class="badge badge-primary">{{ $student->first_name }} {{ $student->last_name }}</span>&nbsp;
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Files
                                </th>
                                <td>
                                    @foreach ($assignment->assignment_files as $file)
                            <div class="col-md-4">
                                <a href="{{ asset('storage/'.$file->file) }}" target="_blank">{{ $file->file_name }}</a>
                            </div>
                        @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('assignments.index') }}">
                           Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
  @endsection
