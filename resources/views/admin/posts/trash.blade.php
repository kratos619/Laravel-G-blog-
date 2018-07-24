@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      {{--  <th scope="col">Category</th>  --}}
      {{--  <th scope="col"></th>  --}}
      <th scope="col">Edit</th>
      <th scope="col">Restore</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($all_trashed_posts as $posts)
    <tr>
     <th scope="row">{{ $posts->title }}</th>
      <td>{{ $posts->content }}</td>
      
      <td><a href="" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Edit</a></td>
      <td><a href="{{route('post.restore',['id'=> $posts->id ])}}" class="btn btn-outline-success"> Restore</a></td>
    
      <td><a href="{{route('post.kill',['id'=> $posts->id ])}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</a></td>
      
    </tr>
    @endforeach
  </tbody>
</table>
@stop