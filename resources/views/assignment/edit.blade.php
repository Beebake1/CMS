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
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Edit Assignment</h5>
              </div>
              <div class="card-body">
                  <form action="{{ route('assignments.update',$assignment->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    <div class="form-group">
                        <label>Title <span class="required-span">*</span></label>
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Enter Title" value="{{ old('title', $assignment->title) }}" >
                        @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description">{{ old('description', $assignment->description) }}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>

                    <label for="assignmentFiles">Files</label>
                    <div class="form-group">
                        <input type="file" class="form-control dropify {{ $errors->has('assignmentFiles') ? 'is-invalid' : '' }}" name="assignmentFiles[]" multiple  value="{{ old('assignmentFiles', '') }}">
                        @if($errors->has('assignmentFiles'))
                            <div class="invalid-feedback">
                                {{ $errors->first('assignmentFiles') }}
                            </div>
                        @endif
                    </div>
                    @foreach ($assignment->assignment_files as $file)
                    <div class="col-md-4">
                        <a href="{{ asset('storage/'.$file->file) }}" target="_blank">{{ $file->file_name }}</a>
                        <a class="btn btn-danger btn-xs delete_file float-right" href="javascript:void(0)" file_id="{{ $file->id }}"><i class="fas fa-trash"></i></a>
                    </div>
                        @endforeach
                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course" value="{{ old('course', $assignment->course) }}">
                            <option value="">--</option>
                            @foreach ($courses as $course)
                            <option @if ($course->id == $assignment->course) selected @endif value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('course'))
                            <div class="invalid-feedback">
                                {{ $errors->first('course') }}
                            </div>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="student">Students</label>
                        <select class="form-control {{ $errors->has('student') ? 'is-invalid' : '' }}" multiple name="student">
                            <option value="">--</option>
                            @foreach ($students as $student)
                            <option  @if ($student->id == $assignment->student) selected @endif value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
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
  @endsection
  @section('javascript')
  <script>
      $(function(){
        $('.dropify').dropify();
        $(document).on('click','.delete_file',function(){
        $(this).addClass('checking_status');
         var $file_id = $(this).attr('file_id');
        $delete = $.post(  "/assignments/file/delete/"+$file_id,{_token: '{{ csrf_token() }}' })
        .done(function() { $('.checking_status').parent().remove(); }).fail(function(jqxhr, settings, ex) {$('.checking_status').removeClass('checking_status'); });
        });

    });
  </script>
  @endsection
