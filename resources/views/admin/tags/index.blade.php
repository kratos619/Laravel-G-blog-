@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tags</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @if($tags->count() > 0)
    @foreach($tags as $tag)
    <tr>
     <th scope="row">{{ $tag->id }}</th>
      <td>{{ $tag->tag }}</td>
      <td><a href="{{ route('tag.edit',['id'=>$tag->id])}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Edit</a></td>
      <td><a href="{{ route('tags.delete',['id'=>$tag->id])}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</a></td>
      
    </tr>
    @endforeach
    @else
    <tr>
      <th class="text-center">No Tags Yet</th>
    </tr>
    @endif
  </tbody>
</table>
@stop