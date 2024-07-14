@extends('pagemaster')
    @section('content')
<section id="content">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="topadd_bar"><a href="{{ $ad->url }}"><img src="{{ asset('temp/img/'.$ad->image) }}" width="700" height="100" style="background-repeat:no-repeat;
                                                                                                                                      background-size:cover;
                                                                                                                                      background-position:center;" alt=""></a></div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="featured_slider">
        <h2 class="featured_title">@lang('words.cloud')</h2>
        <div class="slick_slider">
            @foreach($ads_posts as $post)
                <div class="single_iteam"><img src="{{ asset('temp/img/'.$post->image) }}" height="230" alt="">
                    <h2><a class="slider_tittle" href="{{ route('postDetail.page', ['slug' => $post->slug]) }}">{{ Str::limit($post->title,40) }}</a><h6 class="create">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.y') }}</h6></h2>
                </div>
                <style>
                    *{
                        padding: 0;
                        margin: 0;
                    }
                    .create{
                        font-size: 16px;
                        color: #fff;
                        font-weight: bolder;
                        position: absolute;
                        margin: -220px 10px;
                    }
                </style>
            @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="left_sidebar">
          <div class="single_widget">
            <h2>@lang('words.month')</h2>
            <ul class="post_nav">
                @foreach ($latestPosts as $post)
                    <li>
                        <figure class="effect-lily"><a href="{{ route('postDetail.page', ['slug' => $post->slug]) }}"><img src="{{ asset('temp/img/'.$post->image) }}" height="236.3" width="100%" style="background-size:cover;
                                                                                                                                                        background-repeat:no-repeat;
                                                                                                                                                        background-position:center;" alt=""></a>
                        <figcaption><a href="{{ route('postDetail.page', ['slug' => $post->slug]) }}">{{ Str::limit($post->title,100) }}</a></figcaption>
                        <h6>{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.y') }}</h6>
                        </figure>
                    </li>
                @endforeach
            </ul>
          </div>
          
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-8">
        <div class="middle_content">
          <h2>@lang('words.hot')</h2>
          <ul class="featured_nav">
            @foreach($ads_postsTwo as $post)
                <li class="wow fadeInDown">
                <figure class="featured_img"><a href="{{ route('postDetail.page',$post->slug) }}"><img src="{{ asset('temp/img/'.$post->image) }}" width="500" height="200" alt=""></a></figure>
                <article class="featured_article">
                    <div class="article_category"><a href="#"><i class="fa fa-angle-right"></i></a><a href="#"><i class="fa fa-angle-right"></i></a><a href="#"></a></div>
                    <h2 class="article_titile"><a href="{{ route('postDetail.page',$post->slug) }}">{{ Str::limit($post->title,80) }}</a></h2>
                    <p style="font-size:15px;">{!! Str::limit($post->body,100) !!}</p>
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
                        <div class="media"><a class="media-left" href="{{ route('postDetail.page',$post->slug) }}"><img src="{{ asset('temp/img/'.$post->image) }}" height="70" width="140" style="background-size:cover;
                                                                                                                                                        background-repeat:no-repeat;
                                                                                                                                                        background-position:center;" alt=""></a>
                        <div class="media-body"><a class="catg_title" href="{{ route('postDetail.page',$post->slug) }}">{{ Str::limit($post->title,50) }}</a></div>
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
                        <figure class="effect-lily"><a href="{{ route('postDetail.page',$post->slug) }}"><img src="{{ asset('temp/img/'.$post->image) }}" height="98.6" width="200" style="background-size:cover;
                                                                                                                                                        background-repeat:no-repeat;
                                                                                                                                                        background-position:center;
                                                                                                                                                        margin-left:40px;" alt=""></a>
                        <figcaption><a href="{{ route('postDetail.page',$post->slug) }}">{{ Str::limit($post->title,100) }}</a></figcaption>
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
          
          <div class="single_widget">
            <h2>@lang('words.link')</h2>
            <ul>
              <li><a href="{{ route('contact.page') }}">@lang('words.login')</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
