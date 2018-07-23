@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        create new Posts
    </div>
    <div class="card-body">
    @if(count($errors) > 0)
        <ul class="list-group">
    @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
    @endforeach
        </ul>
        @endif
       <form class="py-4" action="{{route('post.store')}}" method="post" enctype="multipart/form-data" >
        {{csrf_field()}}   
        <div class="form-group">
               <label for="">Title</label>
               <input type="text" name="title" class="form-control">
           </div> 
           <div class="form-group">
               <label for="">Fetured Image</label>
               <input type="file" name="featured" class="form-control">
           </div>
           <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
  </div>
  <div class="form-group">
      <div class="text-center">
          <button class="btn btn-success btn-lg" type="submit">Submit</button>
      </div>
  </div>
       </form>
    </div>
</div>
@stop