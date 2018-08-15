@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit new Posts
    </div>
    <div class="card-body">
@include('admin.includes.errors')

       <form class="py-4" action="{{route('post.update',['id' => $post->id ])}}" method="post" enctype="multipart/form-data" >
        {{csrf_field()}}

        <div class="form-group">
               <label for="">Title</label>
               <input type="text" value="{{$post->title}}" name="title" class="form-control">
           </div>
           <div class="form-group">
               <label for="">Fetured Image</label>
               <input type="file" name="featured" class="form-control">
           </div>
           <div class="form-group col-md-4">
               <label for="cat_name">Select Category</label>
               <select name="category_id" class="form-control" id="category_id">
                 @foreach($selected_cat as $cat)
                 <option value="{{$cat->id}}">{{$cat->name}}</option>
                 @endforeach

                </select>
           </div>
            <div class="form-group">
                <label for="">select Tags</label>
                @foreach($selected_tag as $tag)
                <div class="checkbox">
                    <label for="tags"><input type="checkbox"
                         @foreach($post->tags as $t)
                            @if($tag->id == $t->id)
                                checked
                            @endif
                         @endforeach                            
                         name="tags[]" value="{{$tag->id}}">  {{$tag->tag}}</label>
                        
                </div>
                @endforeach
                </div>

           <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{$post -> title}}</textarea>
  </div>
  <div class="form-group">
      <div class="text-center">
          <button class="btn btn-info btn-lg" type="submit">Update</button>
      </div>
  </div>
       </form>
    </div>
</div>
@stop
