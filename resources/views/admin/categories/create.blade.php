@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        create new Categories
    </div>
    <div class="card-body">
    @include('admin.includes.errors')
       <form class="py-4" action="{{route('cat.store')}}" method="post" >
        {{csrf_field()}}   
        <div class="form-group">
               <label for="">Name</label>
               <input type="text" name="name" class="form-control">
           </div> 
  <div class="form-group">
      <div class="text-center">
          <button class="btn btn-success btn-lg" type="submit">Create</button>
      </div>
  </div>
       </form>
    </div>
</div>
@stop