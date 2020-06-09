@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="alert alert-danger" role="alert">
  Etes vous sure de vouloir supprimer ce professeur ?
</div>
      </div><!-- /.col -->
      
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
         <form action="/professors/{{$professor->id}}" method="post">
            @method('DELETE')
             @csrf
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Name :</label>
          <div class="col-md-6">{{ $professor->name}}</div>
          <div class="clearfix"></div>
        </div>
        <div class="row">
          <label class="col-md-3">Email :</label>
          <div class="col-md-6">{{ $professor->email}}</div>
          <div class="clearfix"></div>
        </div>
        <div class="row">
          <label class="col-md-3">Password :</label>
          <div class="col-md-6">{{ $professor->password}}</div>
          <div class="clearfix"></div>
        </div>
      </div>
         

               <button class="btn btn-danger">Delete</button> 
              
    </form>
  </div>
</section>  


@endsection