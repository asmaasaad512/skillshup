
@extends('web.layout')

@section('title')
    contact us
@endsection
@section('content')
	<!-- Hero-area -->
    <div class="hero-area section">

<!-- Backgound Image -->
<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('img/page-background.jpg')}})"></div>
<!-- /Backgound Image -->

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <ul class="hero-area-tree">
                <li><a href="{{url('home')}}">Home</a></li>
                <li>Contact</li>
            </ul>
            <h1 class="white-text">@lang('web.getInTouch')</h1>

        </div>
    </div>
</div>

</div>
<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

<!-- container -->
<div class="container">

    <!-- row -->
    <div class="row">
      @include('web.inc.messages')
        <!-- contact form -->
        <div class="col-md-6">
            <div class="contact-form">
                <h4>@lang('web.sendMessage')</h4>
                <form action="{{url('contact/message/send')}}" method="POST">
                    @csrf
                   <input class="input" type="text" name="name" placeholder="@lang('web.name')">
                    <input class="input" type="email" name="email" placeholder="@lang('web.email')">
                    <input class="input" type="text" name="subject" placeholder="@lang('web.subject')">
                    <textarea class="input" name="body" placeholder="@lang('web.enterYourMessage')"></textarea>
                    <button type="submit" class="main-button icon-button pull-right">Send Message</button>
                </form>
            </div>
        </div>
        <!-- /contact form -->

        <!-- contact information -->
        <div class="col-md-5 col-md-offset-1">
            <h4>@lang('web.contactInformation')</h4>
            <ul class="contact-details">
                <li><i class="fa fa-envelope"></i>{{$sett ->email}}</li>
                <li><i class="fa fa-phone"></i>{{$sett -> phone}}</li>
            </ul>

        </div>
        <!-- contact information -->

    </div>
    <!-- /row -->

</div>
<!-- /container -->

</div>
<!-- /Contact -->


@endsection