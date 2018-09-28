@extends('master')
@section('title','Detail')
@section('content')
        
        
    </header><!-- #HEADER -->

    
    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    
	<section class="tada-container content-posts page post-right-sidebar">

    	<!-- CONTENT -->
    	<div class="content col-xs-8">
        
        
        	<!-- ARTICLE 1 -->
        	<article>
            	<div class="post-image">
                	<img src="{!! asset('upload/post/'.$post_detail->thumbnail) !!}" alt="post image 1"> 
                </div>
                <div class="post-text">
                    <h2>{!! $post_detail->title !!}</h2>
                </div>                 
                <div class="post-text text-content">                  
                	{!! $post_detail->content !!}
                </div>
            
            
       	 	</article>


        
        
        </div>


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
                    @foreach($post_detail_featured as $item_post_detail_featured)
                        <div class="item">
                            <img style="width: 100px;height: 100px;" src="{{ asset('upload/post/'.$item_post_detail_featured->thumbnail) }}" alt="post 1" class="post-image">
                            <div class="info-post">
                                <h5><a href="{!! url('Detail',[$item_post_detail_featured->id,$item_post_detail_featured->slug]) !!}.html">{!! $item_post_detail_featured->title !!}</a></h5>
                                <span class="date">{!! $item_post_detail_featured->created_at !!}</span>    
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