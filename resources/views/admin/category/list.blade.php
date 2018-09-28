@extends('admin.master')
@section('title','Category')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Category</h3>
        <a href="{{ route('category.create') }}" class="btn btn-success btn-add" >Add</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent_id</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0; ?>
                @foreach($category as $item_category)
                <?php $stt+=1; ?>
                <tr>
                    <td>{{$stt}}</td>
                    <td>{!! $item_category->name !!}</td>
                    <td>{!! $item_category->slug !!}</td>
                    <td>
                    	@if($item_category->parent_id == 0)
                    		{{ "None" }}
                    	@else
                    		<?php 
	                    		$parent = DB::table('categories')->where('id',$item_category->parent_id)->first();
	                    		echo "Thuộc Mục ".$parent->name;
	                    	?>
                    	@endif
                    </td>
                    <td>
                    	<img src="{{ url('upload/category/',$item_category->thumbnail) }}" width="200px" height="150px">
                    </td>
                    <td>
                        <button data-url="{{ route('category.show',$item_category->id) }}" data-toggle="modal" data-target="#show" class="btn btn-primary btn-show" type="button">Detail</button>

                        <a href="{{ route('category.edit',$item_category->id) }}"><button type="button"  class="btn btn-warning btn-edit">Edit</button></a>

                       	<form action="{{ route('category.destroy',$item_category->id) }}" method="POST">
                        	{{ csrf_field() }}
							{{ method_field('delete') }}
							<a onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?')" href="{{ route('category.destroy',$item_category->id) }}"><button class="btn btn-danger">Delete</button></a>
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
                    <h4 class="modal-title">Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">name: </label>
                        <h3 id="name" class="form-control"></h3>
                    </div>
                    <div class="form-group">
                        <label for="">Slug: </label>
                        <h3 id="slug" class="form-control"></h3>
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
                        $('h3#name').text(response.data.name);
                        $('h3#slug').text(response.data.slug);
                    }
                })
            })
        })
    </script>
@endsection