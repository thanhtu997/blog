@extends('admin.master')
@section('title','Create user')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">User</h3>
        <a href="{{ route('user.index') }}" class="btn btn-success">List</a>
    </div>
    <div class="box-body">

        <form action="{{ route('user.store') }}" method="POST" role="form">
            @csrf
                <div class="form-group">
                    <label for="">Name: </label>
                    <input type="text" name="name" class="form-control" id="user-name" placeholder="Name" value="{{ old('name') }}">
                     @if ($errors->has('name'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Email: </label>
                    <input type="text" name="email" class="form-control" id="user-email" placeholder="Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" name="password" class="form-control" id="user-password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Password-Comfirm: </label>
                    <input type="password" name="password_comfirm" class="form-control" id="user-password-confirm" placeholder="Password-Comfirm">
                    @if ($errors->has('password_comfirm'))
                        <span class="help-block" style="color: red">
                            <strong>{{ $errors->first('password_comfirm') }}</strong>
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