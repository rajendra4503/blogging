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
      <td><a href="{{route('category.edit',['id'=>$cat->id])}}" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
      <td><a href="{{route('category.delete',['id'=>$cat->id])}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>       
@stop