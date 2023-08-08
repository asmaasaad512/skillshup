@extends('admin.layout')
@section('title')
admin-questions
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">exams</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          @include('admin.inc.message')
          <div class="card">
<div class="card-header">
<h3 class="card-title"> Exam {{ $exam -> name('en')}}</h3>
 <div class="card-tools">

<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-model">
add new
</button> -->
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-sm">
 <thead>
    <tr>
       <th> id</th>
       <th>Title</th> 
       <th>Options</th>
       <th>Right_answer</th>
       <th>Created_at</th>
       <th>Action</th>
    </tr>
 </thead>
<tbody>
@foreach($exam -> questions as $question )
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $question -> title}}</td>
<td>
1-{{$question -> option_1}}<br>  
2-{{ $question -> option_2}}<br>    
3-{{$question -> option_3}}<br>    
4-{{$question -> option_4}}<br>      
</td>
<td>{{$question -> Right_answer}}</td>
 
 <td>{{$question -> created_at}}</td> 
 <td><a  class="btn btn-sm btn-info" href="{{url("dashboard/exams/questions/edit/{$exam ->id}/{$question->id}")}}">
  <i class="fas fa-edit"></i>  
</a></td>
</tr>

@endforeach
</tbody>
</table>


 </div>

          </div>
        

        <a  class="btn btn-sm btn-primary" href="{{url()->previous()}}">
        Back
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection