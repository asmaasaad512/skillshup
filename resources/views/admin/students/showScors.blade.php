@extends('admin.layout')
@section('title')
admin-students
@endsection
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Score  {{$student -> name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
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
<h3 class="card-title"> show scores {{$student -> name}}</h3>
 <div class="card-tools">



</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name(en)</th>
<th>Name(ar)</th>
<td>At</td>
<th>time_mins </th>
<th>score</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($exams as $exam)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{$exam->name('en')}}</td>
<td>{{$exam->name('ar')}}</td>

<td>{{$exam->pivot->created_at}}</td>
<td>{{$exam ->pivot -> time_mins}}</td>
<td>{{$exam ->pivot ->score}}</td>
<td>{{$exam-> pivot -> status}}</td>
<td>
@if($exam-> pivot -> status == 'closed')  
<a  class="btn btn-sm btn-danger" href="{{url("dashboard/students/open-exam/{$exam ->id}/{$student->id}")}}">
  <i class="fas fa-lock-open"></i>  
</a>
@else
<a  class="btn btn-sm btn-success" href="{{url("dashboard/students/closed-exam/{$exam ->id}/{$student->id}")}}">
  <i class="fas fa-lock"></i>  
</a>
@endif
</td>



</tr>
@endforeach
</tbody>

</table>

</div>
<!--end card-->
</div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->









@endsection