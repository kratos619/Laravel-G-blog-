@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create new Tags
    </div>
    <div class="card-body">
    
       <form class="py-4" action="{{route('tag.store')}}" method="post" >
        {{csrf_field()}}   
        <div class="form-group">
               <label for="">Name</label>
               <input type="text" name="tag" class="form-control">
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