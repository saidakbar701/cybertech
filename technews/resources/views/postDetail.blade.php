@extends('pagemaster')
    @section('content')
    <section id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="topadd_bar"><a href="#"><img src="{{ asset('temp/images/addbanner_728x90_V1.jpg') }}" alt=""></a></div>
      </div>
    </div>
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
          
            <h5> <i style="color:dodgerblue;" class="fa fa-eye"></i> {{ $posts->view }}</h5>

          <img src="{{ asset('temp/img/'.$posts->image) }}" style="width:700px;" alt="">
          <div class="single_page_area">
            <h1>{{ $posts->title }}</h1>
            <div class="post_commentbox"><a href="#"><i class="fa fa-user"></i> Wpfreeware</a> <span><i class="fa fa-calendar"></i> {{ $posts->created_at->format('H:i') }} / {{ $posts->created_at->format('d.m.y') }} </span> <a href="#"><i class="fa fa-tags"></i> Technology</a></div>
            <div class="single_content">
              
              <p>{!! $posts->body !!}</p>

              <br>
            @foreach ($post->tags as $tag)
              <a style="margin-left:20px;
                        color:dodgerblue;
                        font-size:20px;"href="">#{{ $tag->name }}</a>
            @endforeach
              
            </div>
          </div>
        </div>
        <div class="social_link">
          <ul class="social_nav">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
        </div>
        <div class="related_post">
          <h2>@lang('words.related') <i class="fa fa-thumbs-o-up"></i></h2>
          <ul class="ppost_nav wow fadeInDown">
            @foreach ($otherPosts as $post)
                <li>
                    <div class="media"><a href="{{ route('postDetail.page', ['slug' => $post->slug]) }}" class="media-left"><img alt="" src="{{ asset('temp/img/'.$post->image) }}" style="width:200px;
                                                                                                                                                                                           height:100px;"></a>
                        <div class="media-body"><a href="{{ route('postDetail.page', ['slug' => $post->slug]) }}" class="catg_title">{{ Str::limit($post->title,40) }}</a></div>
                    </div>
                </li>
            @endforeach
          </ul>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="right_sidebar">
          <div class="single_widget">
            <h2>@lang('words.popular')</h2>
            <ul class="ppost_nav wow fadeInDown">
            @foreach($popularPosts as $post)
                    <li>
                        <div class="media"><a class="media-left" href="{{ route('postDetail.page', ['slug' => $post->slug]) }}""><img src="{{ asset('temp/img/'.$post->image) }}" height="70" width="140" style="background-size:cover;
                                                                                                                                                        background-repeat:no-repeat;
                                                                                                                                                        background-position:center;" alt=""></a>
                        <div class="media-body"><a class="catg_title" href="{{ route('postDetail.page', ['slug' => $post->slug]) }}"">{{ Str::limit($post->title,50) }}</a></div>
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
            <li><a href="{{ route('categoryPosts.page',$category->slug) }}">{{ $category->name }}</a></li>
          @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    @endsection