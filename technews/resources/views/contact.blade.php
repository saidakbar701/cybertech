@extends('pagemaster')
    @section('content')
<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="topadd_bar"><a href="#"><img src="../images/addbanner_728x90_V1.jpg" alt=""></a></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-sm-8 col-sm-8">
        @if (session()->has('success'))
        
            <h4 style="color:white;
                       background-color:dodgerblue;">{{ Session::get('success') }}</h4>

        @endif
        <div class="contact_area wow fadeInLeftBig">
          <form action="{{ route('sendMail') }}" class="contact_form" method="POST">
            @csrf
            <input class="form-control" type="text" name="name" placeholder="@lang('words.name')">
            <input class="form-control" type="mail" name="email" placeholder="@lang('words.mailrequired')">
            <input class="form-control" type="text" name="subject" placeholder="@lang('words.subject')">
            <textarea class="form-control" cols="30" name="message" rows="10" placeholder="@lang('words.message')"></textarea>
            <input type="submit" value="@lang('words.submit')">
          </form>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-sm-4">
        <div class="contact_address wow fadeInRightBig">
          <h3>@lang('words.adress')</h3>
          <p>@lang('words.uzbekistan')</p>
          <h4>Cyber Tech</h4>
          <address>
          <p>@lang('words.location')</p>
          <p>P:+998(90)908-95-80</p>
          <a href="mailto:#">saidakbarhasanovvuz@email.com</a>
          </address>
        </div>
      </div>
    </div>
  </div>
</section>
    @endsection