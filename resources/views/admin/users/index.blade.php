@extends('layouts.app')
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      {{--  <th scope="col">Category</th>  --}}
      {{--  <th scope="col"></th>  --}}
      <th scope="col">Permissions</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
        <td>
          <img src="{{ asset($user->profile->avatar)}}" width="60" height="60" alt="">
        </td>
        <td>
          {{$user -> name }}
        </td>
        <td>
          Permission
        </td>
      <td>
        Delete
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop
