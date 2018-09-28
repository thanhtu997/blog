@extends('master')
@section('title','Tìm Kiếm')
@section('content')   
        
    </header>
    
	<section class="tada-container content-posts post post-full-width">

    	<div class="content col-xs-12">
			<article>
				<h2 class="tada">Tìm kiếm với từ khóa: <span>{{ $keyword }}</span></h2><br>
                @foreach($item as $items)
		        	<div class="col-xs-4">  
		            	<article>
		                	<div class="post-image">
		                    	<img style="height: 200px;" src="{!! asset('upload/post/'.$items->thumbnail) !!}" alt="post image 1">
		                    </div>
		                    <div class="post-text">
		                    	<span class="date">{!! $items->created_at !!}</span>
		                        <h2 style="height: 120px;"><a href="{!! url('Detail',[$items->id,$items->slug]) !!}.html">{!! $items->title !!}</a></h2>
		                                                        
		                    </div>
		                   {{--  <div class="post-info">
		                    	<div class="post-by">Post By <a href="#">AD-{{ Auth::user()->name }}</a></div>
		                    </div> --}}
		                </article>
		           </div>
		        @endforeach 
       	 	</article>
        
        
        </div>
        
   		<div class="clearfix"></div>
        
        
    </section>

@endsection