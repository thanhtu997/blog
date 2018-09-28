@extends('admin.master')
@section('title','User')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">User</h3>
        <a href="{{ route('user.create') }}" class="btn btn-success btn-add" >Add</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0; ?>
                @foreach($user as $item_user)
                <?php $stt+=1; ?>
                <tr>
                    <td>{{$stt}}</td>
                    <td>{!! $item_user->name !!}</td>
                    <td>{{ $item_user->email }}</td>
                    <td>
                        <button data-url="{{ route('user.show',$item_user->id) }}" data-toggle="modal" data-target="#show" class="btn btn-primary btn-show" type="button">Detail</button>

                        <a href="{{ route('user.edit',$item_user->id) }}"><button type="button"  class="btn btn-warning btn-edit">Edit</button></a>

                        <button data-token="{{ csrf_token() }}" data-url="{{ route('user.destroy',$item_user->id) }}"​ type="button" class="btn btn-danger btn-del">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->

    <div class="modal fade" id="show">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">name: </label>
                        <h3 id="name" class="form-control"></h3>
                    </div>
                    <div class="form-group">
                        <label for="">Email: </label>
                        <h3 id="email" class="form-control"></h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" data-url="{{ route('user.store') }}" id="form-add" method="POST" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" name="name" class="form-control" id="user-name" placeholder="Name">
                             @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="text" name="email" class="form-control" id="user-email" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password: </label>
                            <input type="text" name="password" class="form-control" id="user-password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password-Comfirm: </label>
                            <input type="text" name="password_comfirm" class="form-control" id="user-password-confirm" placeholder="Password-Comfirm">
                            @if ($errors->has('password_comfirm'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_comfirm') }}</strong>
                                </span>
                            @endif
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="" id="form-edit" method="POST" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" name="name" class="form-control" id="user-name-edit" placeholder="Name">
                             @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="text" name="email" class="form-control" id="user-email-edit" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password: </label>
                            <input type="text" name="password" class="form-control" id="user-password-edit" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password-Comfirm: </label>
                            <input type="text" name="password_comfirm" class="form-control" id="user-password-confirm-edit" placeholder="Password-Comfirm">
                            @if ($errors->has('password_comfirm'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_comfirm') }}</strong>
                                </span>
                            @endif
                        </div>
                    
                        
                    
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div> --}}

</div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript" charset="utf-8">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('.btn-show').click(function(event) {
                var url = $(this).attr('data-url');
                $.ajax({
                    type:'get',
                    url:url,
                    success: function(response){
                        $('h3#name').text(response.data.name);
                        $('h3#email').text(response.data.email);
                    }
                })
            })

            $('.btn-add').submit(function(e){
                e.preventDefault();
                var url = $(this).attr('data-url');
                $.ajax({
                    type:'post',
                    url:url,
                    data:{
                        name: $('#user-name').val(),
                        email: $('#user-email').val(),
                        password: $('#user-password').val(),
                    },
                    success: function(response){
                        toastr.success('Thêm Mới Thành Công!')
                        setTimeout(function(){
                            window.location.href="{{ route('user.index') }}"
                        },1000)
                    },error: function (jqXHR, textStatus, errorThrown) {

                    }
                })
            })
            $('.btn-del').click(function(event){
                var url=$(this).data('url');
                var token = $(this).data('token')
                if (confirm('Bạn có chắc muốn xóa không?')) {
                    $.ajax({
                        type:'delete',
                        url:url,
                        data:{
                            _token:token,
                        },
                        success: function(response){
                            toastr.warning('Xóa thành công !')
                            setTimeout(function () {
                                window.location.reload()
                            },800)
                        },error: function(jqXHR, textStatus, errorThrown){
                        }
                    })
                }
            })
        })
    </script>
@endsection