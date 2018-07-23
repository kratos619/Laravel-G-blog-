@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categories</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
     <th scope="row">{{ $category->id }}</th>
      <td>{{ $category->name }}</td>
      <td><a href="{{ route('category.edit',['id'=>$category->id])}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Edit</a></td>
      <td><a href="{{ route('category.delete',['id'=>$category->id])}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</a></td>
      
    </tr>
    @endforeach
  </tbody>
</table>
@stop