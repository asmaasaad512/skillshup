@extends('web.layout')
@section('title')
Sign Up
@endsection
@section('content')
<div class="alert alert-success">vertivication sent email successfuly</div>
<div class="container">

<!-- row -->
<div class="row">

    <!-- login form -->
    <div class="col-md-6 col-md-offset-3">
<form action="{{url('/email/verification-notification')}}" method="post">
@csrf   
<button type="submit" class="main-button icon-button pull-right">Resend email</button>
</form>
    </div>
</div>
</div>
@endsection
