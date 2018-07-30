@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Update Tags : {{$tag->tag}}
    </div>
    <div class="card-body">
    @include('admin.includes.errors')
    <form class="py-4" action="{{route('tag.update',['id' => $tag->id])}}" method="post" >
    {{csrf_field()}}   
        <div class="form-group">
               <label for="Name">Name</label>
               <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
           </div> 
  <div class="form-group">
      <div class="text-center">
          <button class="btn btn-success btn-lg" type="submit">Update</button>
      </div>
  </div>
       </form>
    </div>
</div>
@stop