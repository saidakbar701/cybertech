<!DOCTYPE html>
<html>
<head>
<title>Cyber Tech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('temp/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('temp/assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('temp/assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('temp/assets/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('temp/assets/css/theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('temp/assets/css/style.css') }}">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<header id="header">
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="index.html"><img src="{{ asset('temp/images/logo.png') }}" alt=""></a></div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav custom_nav">
          <li class="active"><a href="{{ route('index.page') }}">@lang('words.home')</a></li>
            @foreach($categories as $category)
                <li><a href="{{ route('categoryPosts.page',$category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
          <li><a href="{{ route('contact.page') }}">@lang('words.contact')</a></li>
        </ul>
      </div>
      <div class="language">
        <ul class="languages">
            <li class="rus"><a href="{{ route('login') }}"><img src="{{ asset('temp/images/admin.png') }}" alt=""></a></li>

            <a href="/lang/uz" class="rus"><img src="{{ asset('temp/images/uzb.ico') }}" alt=""></a>
            <a href="/lang/ru" class="rus"><img src="{{ asset('temp/images/rus.ico') }}" alt=""></a>
            <a href="/lang/en" class="rus"><img src="{{ asset('temp/images/unk.png') }}" alt=""></a>
        </ul>
        <style>
            *{
                padding: 0;
                margin: 0;
            }
            .languages {
                display: flex;
                margin-left: 85%;
                position: absolute;
                top: 12px;
            }
            .languages a{
                margin-left: 10px;
                font-size: 20px;
                border: 1px solid white;
                height: 28px;
                width: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: white;
            }
            .languages a:hover{
              transition: 0.5s;
            }
            a.rus img{
              width: 20px;
            }
        </style>
      </div>
      <div class="search"><a class="search_icon" href="#"><i class="fa fa-search"></i></a>
        <form action="{{ route('search.page') }}" method="GET">
          <input class="search_bar" type="text" name="key\" placeholder="Search here">
        </form>
      </div>
      
    </div>
    
  </nav>
  
</header>


@yield('content')


<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>@lang('words.category')</h2>
            <ul class="labels_nav">
             @foreach($categories as $category)
              <li><a href="{{ route('categoryPosts.page',$category->slug) }}">{{ $category->name }}</a></li>
             @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget">
            <h2>@lang('words.popular')</h2>
            <ul class="ppost_nav wow fadeInLeftBig">
            @foreach($popularPosts as $post)
              <li>
                <div class="media"><a href="{{ route('postDetail.page', ['slug' => $post->slug]) }}" class="media-left"><img alt="" style="width:100px;" src="{{ asset('temp/img/'.$post->image) }}"></a>
                  <div class="media-body"><a href="{{ route('postDetail.page', ['slug' => $post->slug]) }}" class="catg_title">{{ Str::limit($post->title,50) }}</a></div>
                </div>
              </li>
            @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget wow fadeInRightBig">
            <h2>@lang('words.flickr')</h2>
          </div>
          <div class="image">
            @foreach($latestPosts as $post)
            <a href="{{ route('postDetail.page', ['slug' => $post->slug]) }}"><li><img  src="{{ asset('temp/img/'.$post->image) }}" height="60" width="120" style="margin-top:13px;" alt=""></li></a>
            @endforeach
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget wow fadeInRightBig">
            <h2>@lang('words.fallow')</h2>
            <form action="#" class="subscribe_form">
              <p id="subscribe-text">@lang('words.promise')</p>
              <p id="subscribe-email">
                <input type="text" placeholder="@lang('words.email')" name="email">
              </p>
              <p id="subscribe-submit">
                <input type="submit" value="@lang('words.submit')">
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <p class="copyright">Copyright &copy; 2045 <a href="index.html">Cyber Tech</a></p>
      <p class="developer">Developed By <a style="color:white;" href="https://t.me/Khasanov_SF">Khasanov</a></p>
    </div>
  </div>
</footer>
<script src="{{ asset('temp/assets/js/jquery.min.js') }}"></script> 
<script src="{{ asset('temp/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('temp/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('temp/assets/js/slick.min.js') }}"></script> 
<script src="{{ asset('temp/assets/js/custom.js') }}"></script>
</body>
</html>