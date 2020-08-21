@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Add Course</h5>
              </div>
              <div class="card-body">
                  <form action="{{ route('courses.store') }}" method="POST">
                    <div class="form-group">
                        <label>Title <span class="required-span">*</span></label>
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Enter Title" value="{{ old('title', '') }}" >
                        @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="editor" >{{ old('description', '') }}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>

                            @csrf
                        <button class="btn btn-success" type="submit">Save</button>&nbsp;<a href="{{ route('courses.index') }}" class="btn btn-danger">Back</a>
                 </form>
              </div>
            </div>
        </div>
    </div>
</div>
  @endsection
