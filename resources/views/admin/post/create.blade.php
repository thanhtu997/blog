@extends('admin.master')
@section('title','Create Post')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Post</h3>
        <a href="{{ route('post.index') }}" class="btn btn-success">List</a>
    </div>
    <div class="box-body">

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
	            <div class="form-group">
	                <label>Danh Mục</label>
	                <select class="form-control" name="sltparent">
	                    <option>Vui Lòng Chọn Danh Mục</option>

	                    <?php category_parent($category,0,"--",old('sltparent')); ?>

	                </select>
                </div>
                <div class="form-group">
                    <label for="">Title: </label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                     @if ($errors->has('title'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Content: </label>
                    <textarea class="form-control" rows="3" id="content" name="content">{{ old('content') }}</textarea>
                    <script>
					    var editor = CKEDITOR.replace( 'content' );
					</script>
                    @if ($errors->has('content'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Description: </label>
                    <textarea class="form-control" rows="3" id="description" name="description">{{ old('content') }}</textarea>
                    <script>
                        var editor = CKEDITOR.replace( 'description' );
                    </script>
                    @if ($errors->has('description'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="">thumbnail: </label>
                    <input type="file" name="thumbnail" class="form-control">
                    @if ($errors->has('thumbnail'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('thumbnail') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group" >
                    <label>Bài Viết nổi bật</label><br>
                    On: <input type="radio" checked name="noibat" value="1">
                    Off: <input type="radio" name="noibat" value="0">
                </div>
                <div class="form-group">
                    <label for="">Tag: </label><br>
                    {{-- <input type="text" name="tag" class="form-control" placeholder="Tag"> --}}
                    <input type="text" class="form-control" name="tag" id="tags" data-role="tagsinput"/>
                    @if ($errors->has('tag'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('tag') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>


    
@endsection