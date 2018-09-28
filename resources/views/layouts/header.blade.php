<!-- LOGO -->    
    	<div class="logo-container">
        	<a href="{{ url('/') }}"><img src="img/logo.png" alt="logo" ></a>
            <div class="tada-social">
            	<a href="https://www.facebook.com/CunLove.S2"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <a href="#"><i class="icon-vimeo4"></i></a>
                <a href="#"><i class="icon-linkedin2"></i></a>
            </div>
        </div>
        
        
    	<!-- MENU DESKTOP -->
    	<nav class="menu-desktop menu-sticky">
    
            <ul class="tada-menu">
                <li><a href="{{ url('/') }}" class="active">Trang Chủ</a></li>
                <?php
                    $menu_level_1 = DB::table('categories')->where('parent_id',0)->get();
                ?>
                @foreach($menu_level_1 as $item_menu_level_1)
                    <li><a href="#">{!! $item_menu_level_1->name !!} <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <?php
                                $menu_level_2 = DB::table('categories')->where('parent_id',$item_menu_level_1->id)->get();
                            ?>
                            @foreach($menu_level_2 as $item_menu_level_2)
                        	   <li><a href="{!! url('Category',[$item_menu_level_2->id,$item_menu_level_2->slug]) !!}.html">{!! $item_menu_level_2->name !!}</a></li>
                            @endforeach  
                        </ul>
                    </li>
                @endforeach
            </ul>
        
        </nav>
        
        
        <!-- MENU MOBILE -->  
        <div class="menu-responsive-container"> 
            <div class="open-menu-responsive">|||</div> 
            <div class="close-menu-responsive">|</div>              
            <div class="menu-responsive">   
                <ul class="tada-menu">
                     <li><a href="#" class="active">HOME <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="home-1-column.html">Home 1 Column</a></li>
                            <li><a href="index.html" class="active">Home 1 Column + Sidebar</a></li>                            
                            <li><a href="home-2-columns-with-sidebar.html">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>                                                                      
                        </ul>
                    </li>
                    <li><a href="#">FEATURES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>                            
                            <li><a href="post.html">Post Full Width</a></li>
                            <li><a href="post-with-right-sidebar.html">Post + Right Sidebar</a></li>
                            <li><a href="post-with-left-sidebar.html">Post + Left Sidebar</a></li>
                            <li><a href="no-sticky.html">No Sticky Menu</a></li>
                            <li><a href="no-slider.html">No Slider</a></li> 
                            <li><a href="#">Submenu <i class="icon-arrow-right8"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                    <li><a href="#">Item 4</a></li>
                                </ul>
                            </li>                                                                                            
                        </ul>                
                    </li>                                     
                    <li><a href="#">BLOG <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                        	<li><a href="blog-1-column.html">Blog 1 Column</a></li>
                            <li><a href="blog-1-column-with-sidebar.html">Blog + Sidebar</a></li>                            
                            <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns + Sidebar</a></li>
                            <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                            <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>                                                                      
                        </ul>                
                    </li> 
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>                        
            </div>
        </div> <!-- # menu responsive container -->
        <!-- SEARCH -->
		<div class="tada-search">
			<form method="get" action="{{ asset('search/') }}">
		    	<div class="form-group-search">
		      		<input type="search" name="result" class="search-field" placeholder="Search and hit enter...">
		      		<button type="submit" class="search-btn"><i class="icon-search4"></i></button>
		    	</div>
		  	</form>
		</div>