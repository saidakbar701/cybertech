@extends('pagemaster')
    @section('content')
<section id="content">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="topadd_bar"><a href="#"><img src="{{ asset('temp/images/addbanner_728x90_V1.jpg') }}" alt=""></a></div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">

    <h2 style="postiton:absolute;
               margin:20px 16px;
               width:300px;
               height:50px;
               display:flex;
               justify-content:center;
               align-items:center;
               background-color:dodgerblue;
               color:white;">{{ $category->name }}</h2>
      
      <div class="col-lg-6 col-md-6 col-sm-8">
        <div class="middle_content">
          <h2>@lang('words.hot')</h2>
          <ul class="featured_nav">
            @foreach($category->posts as $post)
                <li class="wow fadeInDown">
                <figure class="featured_img"><a href="#"><img src="{{ asset('temp/img/'.$post->image) }}" alt=""></a></figure>
                <article class="featured_article">
                    <div class="article_category"><a href="#"><i class="fa fa-angle-right"></i></a><a href="#"><i class="fa fa-angle-right"></i></a><a href="#"></a></div>
                    <h2 class="article_titile"><a href="pages/single_page.html">{{ Str::limit($post->title,80) }}</a></h2>
                    <p style="font-size:15px;">{{ Str::limit($post->body,100) }}</p>
                </article>
                </li>
            @endforeach
          </ul>
          <nav>
            {{ $ads_postsTwo->links() }}
          </nav>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="right_sidebar">
          <div class="single_widget">
            <h2>@lang('words.popular')</h2>
            <ul class="ppost_nav wow fadeInDown">
            @foreach($popularPosts as $post)
                    <li>
                        <div class="media"><a class="media-left" href="pages/single_page.html"><img src="{{ asset('temp/img/'.$post->image) }}" height="70" width="140" style="background-size:cover;
                                                                                                                                                        background-repeat:no-repeat;
                                                                                                                                                        background-position:center;" alt=""></a>
                        <div class="media-body"><a class="catg_title" href="pages/single_page.html">{{ Str::limit($post->title,50) }}</a></div>
                        </div>
                    </li>
                @endforeach
            </ul>
          </div>
          <div class="single_widget">
          <ul class="nav nav-tabs custom-tabs" role="tablist">
              <div style="height:35px;margin:-2px 0;display:flex;justify-content: center;
                         align-items;center;color:white;
                         background-color:dodgerblue;"class="h4"><h4>@lang('words.posts')</h4>
              </div>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="mostPopular">
                <ul class="ppost_nav wow fadeInDown">

                @foreach ($latestPostsTwo as $post)
                    <li>
                        <figure class="effect-lily"><a href="pages/single_page.html"><img src="{{ asset('temp/img/'.$post->image) }}" height="136" width="200" style="background-size:cover;
                                                                                                                                                        background-repeat:no-repeat;
                                                                                                                                                        background-position:center;
                                                                                                                                                        margin-left:40px;" alt=""></a>
                        <figcaption><a href="pages/single_page.html">{{ Str::limit($post->title,100) }}</a></figcaption>
                        <h6>{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.y') }}</h6>
                        </figure>
                    </li>
                @endforeach
                  
                </ul>
              </div>
              
            </div>
          </div>
          <div class="single_widget">
            <h2>@lang('words.category')</h2>
            <ul>
                @foreach($categories as $category)
                    <li class="cat-item"><a href="{{ route('categoryPosts.page',$category->slug) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="left_sidebar">
          <div class="single_widget">
            <h2>@lang('words.month')</h2>
            <ul class="post_nav">
                @foreach ($latestPosts as $post)
                    <li>
                        <figure class="effect-lily"><a href="pages/single_page.html"><img src="{{ asset('temp/img/'.$post->image) }}" height="236.3" width="100%" style="background-size:cover;
                                                                                                                                                        background-repeat:no-repeat;
                                                                                                                                                        background-position:center;" alt=""></a>
                        <figcaption><a href="pages/single_page.html">{{ Str::limit($post->title,100) }}</a></figcaption>
                        <h6>{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.y') }}</h6>
                        </figure>
                    </li>
                @endforeach
            </ul>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
