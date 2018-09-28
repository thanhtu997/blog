<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ asset('blog') }}/">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/slippry.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>
</head>

<body>


    <!-- *****************************************************************
    ** Preloader *********************************************************
    ****************************************************************** -->

    <div id="preloader-container">
        <div id="preloader-wrap">
            <div id="preloader"></div>
        </div>
    </div>

    
    <!-- *****************************************************************
    ** Header ************************************************************ 
    ****************************************************************** --> 

    <header class="tada-container">
    
    
        @include('layouts.header')
        
        @yield('content')

    
    <!-- *****************************************************************
    ** Footer ************************************************************
    ****************************************************************** -->    
    
    <footer class="tada-container">
    
        <!-- FOOTER BOTTOM -->        
        <div class="footer-bottom">
            <span class="copyright">Created by <a href="https://www.facebook.com/CunLove.S2">Thanh Tú</a> Copyright © 2018. All Rights Reserved</span>
            <span class="backtotop">TOP <i class="icon-arrow-up7"></i></span>
            <div class="clearfix"></div>
        </div>
        
        
    </footer>
    
    
    <!-- *****************************************************************
    ** Script ************************************************************
    ****************************************************************** -->  
    
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/slippry.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
