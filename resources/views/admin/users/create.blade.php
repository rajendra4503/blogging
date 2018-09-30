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
                  Create a new user
            </div>

            <div class="panel-body">
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                  <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                  </div>

                  <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                  </div>

                  <div class="form-group">
                        <label for="featured">Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                  </div>
                        
                  <div class="form-group">
                        <label for="content">About</label>
                        <textarea name="about" id="about" cols="5" rows="5" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                        <label for="content">Facebook</label>
                        <input name="facebook" id="facebook" class="form-control">
                  </div>

                  <div class="form-group">
                        <label for="content">YouTube</label>
                        <input name="youtube" id="youtube" class="form-control">
                  </div>

                  <div class="form-group">
                        <label for="content">Twitter</label>
                        <input name="twitter" id="twitter" class="form-control">
                  </div>

                  <div class="form-group">
                        <label for="content">Google +</label>
                        <input name="google" id="google" class="form-control">
                  </div>

                  <div class="form-group">
                        <div class="text-center">
                              <button class="btn btn-success" type="submit">
                                    Store User
                              </button>
                        </div>
                  </div>
               </form>
            </div>
      </div>
@stop