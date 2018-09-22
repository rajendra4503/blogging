@extends('layouts.app')

@section('content')

    @if(count($errors)>0)
        <ul class="list-group">
                @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{$error}}
            </li>
            @endforeach
        </ul>  
    @endif

    <div class="panel panel-default">

        <div class="panel-heading">
            Update Profile
        </div>

        <div class="panel-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="title">User Name</label>
                  <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">User Email</label>
                    <input type="text" value="{{$user->email}}" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    @if($user->profile->avatar)
                    <img width='75' src="{{$user->profile->avatar}}" alt="{{$user->name}}">
                    @else
                    @endif
                </div>

                <div class="form-group">
                    <label for="featured">User Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">New password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                        
                <div class="form-group">
                    <label for="content">About</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Facebook</label>
                    <input value="{{$user->profile->facebook}}" name="facebook" id="facebook" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">YouTube</label>
                     <input value="{{$user->profile->youtube}}" name="youtube" id="youtube" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update User
                        </button>
                    </div>
                </div>

               </form>

            </div>

      </div>
@stop