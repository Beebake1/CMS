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
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                <h5 class="m-0">Add Assignment</h5>
              </div>
              <div class="card-body">
                  <form action="{{ route('assignments.store') }}" enctype="multipart/form-data" method="POST">
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
                                    <label for="description">Description<span class="required-span">*</span></label>
                                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="editor" value="{{ old('description', '') }}"></textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="assignmentFiles">Files</label>
                                    <input type="file" class="form-control dropify {{ $errors->has('assignmentFiles') ? 'is-invalid' : '' }}" name="assignmentFiles[]" multiple  value="{{ old('assignmentFiles', '') }}">
                                    @if($errors->has('assignmentFiles'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('assignmentFiles') }}
                                        </div>
                                    @endif
                                </div>
                                <label for="course">Course<span class="required-span">*</span></label>
                                <div class="form-group">
                                    <select class="form-control {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course" value="{{ old('course', '') }}">
                                        <option value="">--</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('course'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('course') }}
                                        </div>
                                    @endif
                                </div>
                                {{-- <div class="form-group">
                                    <label for="student">Students<span class="required-span">*</span></label>
                                    <select class="form-control {{ $errors->has('student') ? 'is-invalid' : '' }}" multiple name="student" value="{{ old('student', '') }}">
                                        <option value="">--</option>
                                        @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('student'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('student') }}
                                        </div>
                                    @endif
                                </div> --}}
                            @csrf
                        <button class="btn btn-success" type="submit">Save</button>&nbsp;<a href="{{ route('assignments.index') }}" class="btn btn-danger">Back</a>
                 </form>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="add_course_modal modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('courses.create') }}" method="post">
            @include('shared.course_create')
            @csrf
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
        </div>
    </div>
    </div>
  </div>
  @endsection
  @section('javascript')
  <script>
      $(function(){
        $('.dropify').dropify();
        $(document).on('click','.add_course',function(){
            $('.add_course_modal').modal();
        });
      });

  </script>
  @endsection
