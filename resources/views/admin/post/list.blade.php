@extends('admin.master')
@section('title','Post')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Post</h3>
        <a href="{{ route('post.create') }}" class="btn btn-success btn-add" >Add</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Title</th>
                    <th>thumbnail</th>
                    <th>Description</th>
                    <th>Nổi Bật</th>
                    <th>categoty_id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0; ?>
                @foreach($post as $item_post)
                <?php $stt+=1; ?>
                <tr>
                    <td>{{$stt}}</td>
                    <td>{!! $item_post->title !!}</td>
                    <td>
                    	<img src="{{ url('upload/post/',$item_post->thumbnail) }}" width="200px" height="150px">
                    </td>
                    <td>{!! $item_post->description !!}</td>
                    <td>
                        @if($item_post->noibat == 0)
                            <span style="color: red;"><i class="fa fa-ban"></i> OFF</span>
                        @else
                            <span style="color: green;"><i class="fa fa-check"></i> On</span>
                        @endif
                    </td>
                    <td>
                    	
                		<?php 
                    		$category = DB::table('categories')->where('id',$item_post->category_id)->first();
                    	?>
                    	@if(!empty($category->name))
                    		{{ $category->name }}
                    	@endif
                    </td>
                    <td>
                        <button data-url="{{ route('post.show',$item_post->id) }}" data-toggle="modal" data-target="#show" class="btn btn-primary btn-show" type="button">Detail</button>

                        <a href="{{ route('post.edit',$item_post->id) }}"><button type="button"  class="btn btn-warning btn-edit">Edit</button></a>

                       	<form action="{{ route('post.destroy',$item_post->id) }}" method="POST">
                        	{{ csrf_field() }}
							{{ method_field('delete') }}
							<a onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?')" href="{{ route('post.destroy',$item_post->id) }}"><button class="btn btn-danger">Delete</button></a>
                        </form>
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
                    <h4 class="modal-title">Post</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title: </label>
                        <h3 id="title" class="form-control"></h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                        $('h3#title').text(response.data.title);
                    }
                })
            })
        })
    </script>
@endsection