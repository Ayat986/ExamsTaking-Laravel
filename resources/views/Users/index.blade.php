@extends('layouts.admin')

    @section('content')

    <div class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1 class="m-0 text-dark">Liste des étudiants</h1>
    				</div>
</div>
</div>
</div>
<section class="content">
  <div class="container-fluid">
  	<p>
  		<a href="/users/create" class="btn btn-primary">Ajouter un nouveau étudiant</a>
  	</p>
  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>ID</th>
  			<th>Name</th>
  			<th>Email</th>
  
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Action</th>
  		</tr>
  		@forelse($users as $p)
  			<tr>
  				<td>{{ $p->id }}</td>
  				<td>{{ $p->name }}</td>
          <td>{{ $p->email }}</td>
       
          <td>{{ $p->created_at}}</td>
          <td>{{ $p->updated_at}}</td>
  				<td>
           <a href="/users/{{ $p->id }}/edit" class="btn btn-info">Edit</a> 
            <a href="/users/{{$p->id}}" class="btn btn-danger">Delete</a> 
            
          
          </td>
  			</tr>
        @empty
        <p> No student </p>
  		@endforelse
  	</table>
  </div>
</section>	

    				@endsection 