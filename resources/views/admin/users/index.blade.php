@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3> Users </h3>
    </div>
<table class="table">
    <thead>
      <tr>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Permission</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if( $users->count() > 0)
      @foreach($users as $user)
      <tr>
        <td>
          @if($user->profile->avatar)
            <img width='75' src="{{$user->profile->avatar}}" alt="{{$user->name}}">
          @else
            <img width='75' src="" alt="{{$user->name}}">
          @endif
        </td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          @if($user->admin == 1)  
             <a href="{{route('user.not_admin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Remove Permission</a>
          @else
               <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make Admin</a>
          @endif
        </td>
      <td>
        @if(Auth::id() != $user->id)
          <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-xs btn-danger" title="Delete" data-toggle="tooltip">Delete</a>
        @endif
      </td>
      </tr>
      @endforeach
      @else 
      <tr>
          <th colspan="5" class="text-center">No Users</th>
      </tr>
      @endif
    </tbody>
  </table>
</div>       
@stop