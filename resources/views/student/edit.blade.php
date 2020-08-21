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
              <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                <h5 class="m-0">Edit Student</h5>
              </div>
              <div class="card-body">
                  <form action="{{ route('students.update',$student->id) }}" method="POST">
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" placeholder="Enter First Name" value="{{ old('first_name', $student->first_name) }}" required>
                                @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="Enter Last Name" value="{{ old('last_name', $student->last_name) }}" required>
                                @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ old('address', $student->address) }}">
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="course_id">Course</label>
                        <select class="form-control {{ $errors->has('course_id') ? 'is-invalid' : '' }}" name="course_id" value="{{ old('course_id', $student->course_id )}}">
                            <option value="">--</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}" @if($course->id == $student->course_id) selected @endif >{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('course_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('course_id') }}
                            </div>
                        @endif
                    </div>
                        @csrf
                        <button class="btn btn-success" type="submit">Save</button>&nbsp;<a href="{{ route('students.index') }}" class="btn btn-danger">Back</a>
                 </form>
              </div>
            </div>
        </div>
    </div>
</div>
  @endsection
