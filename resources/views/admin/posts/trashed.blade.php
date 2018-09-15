
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
       <h3> Trashed Posts </h3>
     </div>
<table class="table">
    <thead>
      <tr>
        <th>Feature Image</th>
        <th>Title</th>
        <th>Restore</th>
        <th>Destroy</th>
      </tr>
    </thead>
    <tbody>
      @if( $posts->count() > 0)
      @foreach($posts as $post)
      <tr>
        <td><img class="img-thumbnail" width='75' src="{{$post->featured}}" alt="{{$post->title}}"></td>
        <td>{{$post->title}}</td>
        <td><a href="{{route('post.restore',['id'=>$post->id])}}" class="settings" title="Restore" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a></td>
        <td><a href="{{route('post.kill',['id'=>$post->id])}}" class="delete" title="Destroy" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
      </tr>
      @endforeach
      @else 
      <tr>
            <th colspan="5" class="text-center">No Trashed Posts</th>
      </tr>
      @endif
    </tbody>
  </table>
</div>       
@stop