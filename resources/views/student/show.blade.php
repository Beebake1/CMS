@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Show Student
            </div>

            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('students.index') }}">
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
                                    {{ $student->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <td>
                                    {{ $student->first_name }}
                                    {{ $student->last_name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Address
                                </th>
                                <td>
                                    {{ $student->address }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Course
                                </th>
                                <td>
                                    {{ $student->course->title }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('students.index') }}">
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
