@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Nouveau professeur</h1>
      </div><!-- /.col -->
      
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <form method="post" action="/professors">
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Name</label>
          <div class="col-md-6"><input type="text" name="name" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
        <div class="row">
          <label class="col-md-3">Email</label>
          <div class="col-md-6"><input type="text" name="email" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
        <div class="row">
          <label class="col-md-3">Password</label>
          <div class="col-md-6"><input type="text" name="password" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      @csrf
      <div class="form-group ">
        <input type="submit" class="btn btn-info" value="Ajouter">
      </div>
    </form>
  </div>
</section>  


@endsection