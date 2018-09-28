@extends('master')
@section('title','Trang Chủ')
@section('content')




<!-- SLIDER -->
<div class="tada-slider">
	<ul id="tada-slider">
		<li>
        	<img src="img/image-slider-1.jpg" alt="image slider 1">
        	<div class="pattern"></div>
        	<div class="tada-text-container">
            	<h1>AENEAN AC DIAM</h1>
                <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                <span class="button"><a href="#">TEXT BUTTON</a></span>
            </div>
        </li>
		<li>
        	<img src="img/image-slider-2.jpg" alt="image slider 2">
            <div class="pattern"></div>
            <div class="tada-text-container">
            	<h1>MAECENAS CONSECTETUR</h1>
                <h2>Lorem <span class="main-color">ipsum dolor</span> sit amet</h2>
                <span class="button"><a href="#">READ ME</a></span>
            </div>
        </li>
		<li>
        	<img src="img/image-slider-3.jpg" alt="image slider 3">
        	<div class="pattern"></div>
            <div class="tada-text-container">
            	<h1>AENEAN AC DIAM</h1>
                <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                <span class="button"><a href="#">TEXT BUTTON</a></span>
            </div>                
        </li>
        <li>
        	<img src="img/image-slider-4.jpg" alt="image slider 4">
        	<div class="pattern"></div>
            <div class="tada-text-container">
            	<h1>AENEAN AC DIAM</h1>
                <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                <span class="button"><a href="#">TEXT BUTTON</a></span>
            </div>                
        </li>
	</ul>
    
</div><!-- #SLIDER -->
        
        
</header><!-- #HEADER -->


<!-- *****************************************************************
** Section ***********************************************************
****************************************************************** -->

<section class="tada-container content-posts">


<!-- CONTENT -->
<div class="content col-xs-8">

    @if(isset($post))
	@foreach($post as $item_post)     
    	<article>
        	<div class="post-image">
            	<img src="{!! asset('upload/post/'.$item_post->thumbnail) !!}" alt="post image 1">
                <div class="category"><a href="{!! url('/') !!}">IMG</a></div>
            </div>
            <div class="post-text">
            	<span class="date">{!! $item_post->created_at !!}</span>
                <h2><a href="{!! url('Detail',[$item_post->id,$item_post->slug]) !!}.html">{!! $item_post->title !!}</a></h2>
                <p class="text">
                    {!! $item_post->description !!}
                    <a href="{!! url('Detail',[$item_post->id,$item_post->slug]) !!}.html"><i class="icon-arrow-right2"></i></a>
                </p>                                 
            </div>
            <div class="post-info">
            	{{-- <div class="post-by">Post By <a href="#">AD-</a></div> --}}
                <div class="extra-info">
                	<a href="#"><i class="icon-facebook5"></i></a>
            		<a href="#"><i class="icon-twitter4"></i></a>
            		<a href="#"><i class="icon-google-plus"></i></a>
                    <span class="comments">25 <i class="icon-bubble2"></i></span>
                </div>
                <div class="clearfix"></div>
            </div>
        </article>
    @endforeach
    @endif

	<!-- NAVIGATION -->
	<div class="navigation">
        @if($post->currentPage() != 1)
           <a href="{{ str_replace('/?','?',$post->url($post->currentPage() - 1)) }}" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
        @endif

        @if($post->currentPage() != $post->lastPage())
            <a href="{{ str_replace('/?','?',$post->url($post->currentPage() + 1)) }}" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
        @endif
        <div class="clearfix"></div>
    </div>

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
            @foreach($postfeatured as $item_postfeatured)
            	<div class="item">
                	<img style="width: 100px;height: 100px;" src="{{ asset('upload/post/'.$item_postfeatured->thumbnail) }}" alt="post 1" class="post-image">
                    <div class="info-post">
                    	<h5><a href="#">{!! $item_postfeatured->title !!}</a></h5>
                    	<span class="date">{!! $item_postfeatured->created_at !!}</span>	
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
            <a href="https://www.facebook.com/CunLove.S2"><i class="icon-facebook5"></i></a>
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




    <!-- NEWSLETTER -->                          
    <div class="widget newsletter">
    	<h3 class="widget-title">
        	Newsletter
        </h3>
    	<div class="newsletter-container">
			<h4>DO NOT MISS OUR NEWS</h4>
            <p>Sign up and receive the <br> latest news of our company</p> 
            <form>
               <input type="email" class="newsletter-email" placeholder="Your email address...">
               <button type="submit" class="newsletter-btn">Send</button>
          	</form>                                  
        </div>
    	<div class="clearfix"></div>
    </div>  
    
</div> <!-- #SIDEBAR -->

	<div class="clearfix"></div>


</section>
@endsection