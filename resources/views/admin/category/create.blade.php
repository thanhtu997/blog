@extends('admin.master')
@section('title','Create Category')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Category</h3>
        <a href="{{ route('category.index') }}" class="btn btn-success">List</a>
    </div>
    <div class="box-body">

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="">Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
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
                            <?php category_parent($parent); ?>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="">thumbnail: </label>
                    <input type="file" name="thumbnail" class="form-control>
                    @if ($errors->has('email'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Description: </label>
                    <input type="text" name="description" class="form-control" placeholder="description">
                    @if ($errors->has('description'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('description') }}</strong>
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