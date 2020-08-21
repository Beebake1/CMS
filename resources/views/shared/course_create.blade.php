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
