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
      <td>edit</td>
      <td>delete</td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop