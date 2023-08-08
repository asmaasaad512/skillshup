@extends('admin.layout')
@section('title')
admin-categories
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
<h3 class="card-title">all Categories</h3>
 <div class="card-tools">
<!-- <div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>

 </div>  -->

<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-model">
add new
</button>
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name(en)</th>
<th>Name(ar)</th>
<th>Active</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($cats as $cat)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{$cat->name('en')}}</td>
<td>{{$cat->name('ar')}}</td>
@if($cat->active == 1)
<td><span class="badge badge-success">yes</span></td>
@endif
@if($cat->active == 0)
<td><span class="badge badge-danger">no</span></td>
@endif
<td>

<button type="button" class="btn btn-sm btn-info edite-btn"data-id="{{$cat->id}}"data-name-en="{{$cat->name('en')}}" data-name-ar="{{$cat->name('ar')}}" data-toggle="modal" data-target="#edit-model">
  <i class="fas fa-edit"></i>  
</button>
<a  class="btn btn-sm btn-danger" href="{{url("dashboard/categories/delete/{$cat->id}")}}">
  <i class="fas fa-trash"></i>  
</a>
<a  class="btn btn-sm btn-secondary" href="{{url("dashboard/categories/toggle/{$cat->id}")}}">
  <i class="fas fa-toggle-on"></i>  
</a>
</td>

</tr>
@endforeach
</tbody>

</table>
<div class="d-flex justify-content-center my-3">{{$cats->links()}} </div>
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
  <div class="modal fade" id="add-model">
<div class="modal-dialog modal-lg">
<div class="modal-content">
 <div class="modal-header">
<h4 class="modal-title">Add Category</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<!--start form-->
<form id='form-model' action="{{url('dashboard/categories/store')}}" method="post">
  @csrf
<div class="row">
<div class='col-6'>
 <div class="form-group">
<label for="exampleInputEmail1">Name(en)</label>
<input type="text" class="form-control" name='name_en' id="exampleInputEmail1">
</div>
 </div>
  <div class="col-6">
  <div class="form-group">
<label for="exampleInputPassword1">Name(ar)</label>
<input type="text" class="form-control"name='name_ar' id="exampleInputPassword1">
</div>
  </div>
</div>
</form>
<!--end form-->
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" form='form-model' class="btn btn-primary">submit</button>
</div>
</div>

</div>

</div>
<!--start modal alert edit -->
<div class="modal fade" id="edit-model">
<div class="modal-dialog modal-lg">
<div class="modal-content">
 <div class="modal-header">
<h4 class="modal-title">Add Category</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<!--start form-->
<form id='editForm-model' action="{{url('dashboard/categories/update')}}" method="post">
  @csrf
<div class="row">
<input type="hidden" name='id' id="edit-id">
<div class='col-6'>
 <div class="form-group">
<label for="edit-nameEn">Name(en)</label>
<input type="text" class="form-control" name='name_en' id="edit-nameEn">
</div>
 </div>
  <div class="col-6">
  <div class="form-group">
<label for="edite-nameAn">Name(ar)</label>
<input type="text" class="form-control"name='name_ar' id="edit-nameAr">
</div>
  </div>
</div>
</form>
<!--end form-->
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" form='editForm-model' class="btn btn-primary">submit</button>
</div>
</div>

</div>

</div>
@endsection
@section('scripts')
<script>
  $('.edite-btn').click(function(){
  let id =$(this).attr('data-id')
  let nameEn =$(this).attr('data-name-en') 
  let nameAr =$(this).attr('data-name-ar') 
  $('#edit-id').val(id)  
  $('#edit-nameEn').val(nameEn) 
  $('#edit-nameAr').val(nameAr) 
  
  });
  
</script>
@endsection
