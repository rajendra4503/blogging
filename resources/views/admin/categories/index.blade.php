@extends('layouts.app')

@section('content')

<div class="panel panel-default">
<table class="table">
    <thead>
      <tr>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $cat)
      <tr>
      <td>{{$cat->name}}</td>
        <td><a href="">Edit</a></td>
        <td><a href="">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>       
@stop