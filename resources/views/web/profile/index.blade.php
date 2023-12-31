
@extends('web.layout')

@section('title')
skillshub-Profile
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
                <li><a href="{{url('/home')}}">Home</a></li>
                <li>Sign Up</li>
            </ul>
            <h1 class="white-text">Profile</h1>

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

        <!-- login form -->
        <div class="col-md-6 col-md-offset-3">
          <table class="table">
             <thead>
             <tr>
             <th>Exam name</th>
              <th>Score</th>
              <th>Time (mins)</th>   
             </tr>
             </thead>
             <tbody>
             @foreach(Auth::user()->exams as $exam)
                <tr>
                 <td>{{$exam -> name('en')}}</td> 
                 <td>{{$exam ->pivot ->score}}</td>
                 <td>{{$exam -> pivot -> time_mins}}</td>
              
                </tr>
                @endforeach  
             </tbody>  
          </table>
        </div>
        <!-- /login form -->

    </div>
    <!-- /row -->

</div>
<!-- /container -->

</div>
<!-- /Contact -->


@endsection
