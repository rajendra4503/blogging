@extends('layouts.app')
@section('content')
<div class="panel panel-default">
<table class="table">
    <thead>
      <tr>
        <th>Tag</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if($tags->count() > 0)
      @foreach($tags as $tag)
      <tr>
      <td>{{$tag->tag}}</td>
      <td><a href="{{route('tag.edit',['id'=>$tag->id])}}" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
      <td><a href="{{route('tag.delete',['id'=>$tag->id])}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
      </tr>
      @endforeach
      @else 
      <tr>
          <th colspan="6" class="text-center">No Published Tags</th>
      </tr>
      @endif
    </tbody>
  </table>
</div>       
@stop