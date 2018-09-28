@extends('admin.master')
@section('title','Update Post')
@section('content')
<style>
    .img_current{
        width: 200px;
    }
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Post</h3>
        <a href="{{ route('post.index') }}" class="btn btn-success">List</a>
    </div>
    <div class="box-body">

        <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
	            <div class="form-group">
	                <label>Danh Mục</label>
	                <select class="form-control" name="sltparent">
	                    <option>Vui Lòng Chọn Danh Mục</option>

	                    <?php category_parent($category,0,"--",$post->category_id); ?>

	                </select>
                </div>
                <div class="form-group">
                    <label for="">Title: </label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title',isset($post) ? $post['title'] : null ) }}">
                     @if ($errors->has('title'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Content: </label>
                    <textarea class="form-control" rows="3" id="content" name="content">{{ old('content',isset($post) ? $post['content'] : null ) }}</textarea>
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
                    <textarea class="form-control" rows="3" id="description" name="description">{{ old('description',isset($post) ? $post['description'] : null ) }}</textarea>
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
                    <img style="width: 150px;height: auto; margin-top: 5px;" src="{{ asset('upload/post/'.$post->thumbnail) }}">
                        <input type="hidden" name="img_current" value="{{ $post->thumbnail }}">
                    @if ($errors->has('thumbnail'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('thumbnail') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group" >
                    <label>Bài Viết Nổi Bật</label><br>
                    <input type="radio" name="noibat" value="1"
                    @if($post->noibat == 1)
                        checked
                    @endif
                    >
                    On
                    <input type="radio" name="noibat" value="0"
                    @if($post->noibat == 0)
                        checked
                    @endif
                    >
                    Off
                </div>
            </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>


    
@endsection