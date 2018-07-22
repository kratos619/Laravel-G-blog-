@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        create new Posts
    </div>
    <div class="card-body">
       <form action="{{route('post.store')}}" method="post">
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