@extends('admin.master')
@section('title','Update Category')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Category</h3>
        <a href="{{ route('category.index') }}" class="btn btn-success">List</a>
    </div>
    <div class="box-body">

        <form action="{{ route('category.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('put') }}
                <div class="form-group">
                    <label for="">Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name',isset($data) ? $data['name'] : null ) }}">
                     @if ($errors->has('name'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
               <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="sltParent">
                            <option value="0">Please Choose Category</option>
                            <?php category_parent($parent,0,"--",$data->parent_id) ?> 
                        </select>
                    </div>
                <div class="form-group">
                    <label for="">thumbnail: </label>
                    <input type="file" name="thumbnail" class="form-control">
                    <img style="width: 150px;height: auto; margin-top: 5px;" src="{{ asset('upload/category/'.$data->thumbnail) }}">
                    <input type="hidden" name="img_current" value="{{ $data->thumbnail }}">

                    @if ($errors->has('email'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Description: </label>
                    <input type="text" name="description" class="form-control" placeholder="description" value="{{ old('description',isset($data) ? $data['description'] : null ) }}">
                    @if ($errors->has('description'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save changes</button>
			</div>
        </form>
    </div>
</div>


    
@endsection