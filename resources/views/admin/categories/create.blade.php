@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        create new Categories
    </div>
    <div class="card-body">
    @if(count($errors) > 0)
        <ul class="list-group">
    @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
    @endforeach
        </ul>
        @endif
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