@extends('admin.layout')
@section('title')
admin-skills
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Skills</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Skills</li>
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
<h3 class="card-title">all Skills</h3>
 <div class="card-tools">

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
<th>Category</th>
<th>image</th>
<th>Active</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($skills as $skill)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{$skill->name('en')}}</td>
<td>{{$skill->name('ar')}}</td>
<td>{{$skill->category->name('en')}}</td>
<td><img height="50" src="{{asset("uploads/$skill->img")}}"  ></td>
@if($skill->active == 1)
<td><span class="badge badge-success">yes</span></td>
@endif
@if($skill->active == 0)
<td><span class="badge badge-danger">no</span></td>
@endif
<td>

<button type="button" class="btn btn-sm btn-info edite-btn"data-id="{{$skill->id}}"data-name-en="{{$skill->name('en')}}" data-name-ar="{{$skill->name('ar')}}"data-image="{{$skill->img}}" data-cat-id="{{$skill->category_id}}"  data- data-toggle="modal" data-target="#edit-model">
  <i class="fas fa-edit"></i>  
</button>
<a  class="btn btn-sm btn-danger" href="{{url("dashboard/skills/delete/{$skill->id}")}}">
  <i class="fas fa-trash"></i>  
</a>
<a  class="btn btn-sm btn-secondary" href="{{url("dashboard/skills/toggle/{$skill->id}")}}">
  <i class="fas fa-toggle-on"></i>  
</a>
</td>

</tr>
@endforeach
</tbody>

</table>
<div class="d-flex justify-contentter my-3">{{$skills->links()}} </div>
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
<h4 class="modal-title">Add Skill</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
@include('admin.inc.errors')
<!--start form-->
<form id='form-model' action="{{url('dashboard/skills/store')}}" method="post" enctype="multipart/form-data">
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
  <div class="col-6">
  <div class="form-group">
<label for="category_id"> Category Name</label>
<select class="custom-select form-control-border border-width-2"name='category_id' id="category_id">
@foreach($cats as $cat)
<option value="{{$cat->id}}">{{$cat->name('en')}}</option>
@endforeach
</select>
 </div> 
  </div>
  <div class="col-6">
  <div class="form-group">
<label for="exampleInputFile">image</label>
<div class="input-group">
<div class="custom-file">
<input type="file" name='img' class="custom-file-input" id="exampleInputFile">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
</div>

</div>
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
<h4 class="modal-title">Add Skill</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
@include('admin.inc.errors')
<!--start form-->
<form id='editForm-model' action="{{url('dashboard/skills/update')}}" method="post" enctype="multipart/form-data">
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
  <div class="col-6">
  <div class="form-group">
<label for="category_id"> Category Name</label>
<select class="custom-select form-control-border border-width-2"name='category_id' id="edit-category-id">
@foreach($cats as $cat)
<option value="{{$cat->id}}">{{$cat->name("en")}}</option>
@endforeach
</select>
 </div> 
  </div>
  <div class="col-6">
  <div class="form-group">
<label for="exampleInputFile">image</label>
<div class="input-group">
<div class="custom-file">
<input type="file" name='img' class="custom-file-input" id="exampleInputFile">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
</div>

</div>
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
  let img =$(this).attr('data-image') 
  let category_id =$(this).attr('data-cat-id') 
  $('#edit-id').val(id)  
  $('#edit-nameEn').val(nameEn) 
  $('#edit-nameAr').val(nameAr) 
  $('#edit-category-id').val(category_id)
  });
  
</script>
@endsection
