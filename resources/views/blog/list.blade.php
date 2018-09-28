@extends('master')
@section('title','List Post')
@section('content')    
        
        
    </header><!-- #HEADER -->

    
    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    
	<section class="tada-container content-posts blog-2-columns blog-2-columns-sidebar">


      <!-- CONTENT -->    
      <div class="content col-xs-8">
    
        @foreach($post_category as $item_post_category)
        	<div class="col-xs-6">  
            	<article>
                	<div class="post-image">
                    	<img style="height: 200px;" src="{!! asset('upload/post/'.$item_post_category->thumbnail) !!}" alt="post image 1">
                        <div class="category"><a href="{{ url('/') }}">IMG</a></div>
                    </div>
                    <div class="post-text">
                    	<span class="date">{!! $item_post_category->created_at !!}</span>
                        <h2 style="height: 120px;"><a href="{!! url('Detail',[$item_post_category->id,$item_post_category->slug]) !!}.html">{!! $item_post_category->title !!}</a></h2>
                                                        
                    </div>
                    {{-- <div class="post-info">
                    	<div class="post-by">Post By <a href="#">AD-{{ Auth::user()->name }}</a></div>
                    </div> --}}
                </article>
           </div>
        @endforeach
   		<div class="clearfix"></div>
        
        
        <!-- NAVIGATION -->
        <div class="navigation">
            @if($post_category->currentPage() != 1)
               <a href="{{ str_replace('/?','?',$post_category->url($post_category->currentPage() - 1)) }}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
            @endif

            
            @if($post_category->currentPage() != $post_category->lastPage())
                <a href="{{ str_replace('/?','?',$post_category->url($post_category->currentPage() + 1)) }}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
            @endif
            <div class="clearfix"></div>
        </div> 
      
      
      
      </div><!-- #CONTENT -->
      
        
      <!-- SIDEBAR -->        
      <div class="sidebar col-xs-4">
        	
            
            <!-- ABOUT ME -->                  
            <div class="widget about-me">
            	<div class="ab-image">
                	<img src="img/about-me.jpg" alt="about me">
                    <div class="ab-title">About Me</div>
                </div>
                <div class="ad-text">
                	<p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    <span class="signing"><img src="img/signing.png" alt="signing"></span>
                </div>
            </div>


            <!-- LATEST POSTS -->                              
            <div class="widget latest-posts">
            	<h3 class="widget-title">
                    Bài Viết Nổi bật
                </h3>
                <div class="posts-container">
                    @foreach($post_featured as $item_post_featured)
                        <div class="item">
                            <img style="width: 100px;height: 100px;" src="{{ asset('upload/post/'.$item_post_featured->thumbnail) }}" alt="post 1" class="post-image">
                            <div class="info-post">
                                <h5><a href="{!! url('Detail',[$item_post_featured->id,$item_post_featured->slug]) !!}.html">{!! $item_post_featured->title !!}</a></h5>
                                <span class="date">{!! $item_post_featured->created_at !!}</span>    
                            </div> 
                            <div class="clearfix"></div>   
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>


            <!-- FOLLOW US -->                              
            <div class="widget follow-us">
            	<h3 class="widget-title">
                	Follow Us
                </h3>
            	<div class="follow-container">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>                
                </div>
            	<div class="clearfix"></div>
            </div>            


            <!-- TAGS -->                              
            <div class="widget tags">
            	<h3 class="widget-title">
                	Tags
                </h3>
            	<div class="tags-container">
                    <a href="#">Audio</a>
                    <a href="#">Travel</a>
                    <a href="#">Food</a>
                    <a href="#">Event</a>
                    <a href="#">Wordpress</a>
                    <a href="#">Video</a>
                    <a href="#">Design</a>
                    <a href="#">Sport</a>
                    <a href="#">Blog</a>
                    <a href="#">Post</a> 
                    <a href="#">Img</a>
                    <a href="#">Masonry</a>                                    
                </div>
            	<div class="clearfix"></div>
            </div> 
        </div> <!-- #SIDEBAR -->      
      
        <div class="clearfix"></div>
      
                  
    </section>

    
@endsection