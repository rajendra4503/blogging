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
                  Create a new post
            </div>

            <div class="panel-body">
            <form action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Site Name</label>
                    <input type="text" value="{{$setting->site_name}}" name="site_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Contact Number</label>
                    <input type="text" value="{{$setting->contact_number}}" name="contact_number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Contact Email</label>
                    <input type="text" value="{{$setting->contact_mail}}" name="contact_mail" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="title">Address</label>
                    <input type="text" value="{{$setting->address}}" name="address" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="title">Facebook</label>
                    <input type="text" value="{{$setting->facebook}}" name="facebook" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">YouTube</label>
                    <input type="text" value="{{$setting->youtube}}" name="youtube" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Twitter</label>
                    <input type="text" value="{{$setting->twiter}}" name="twiter" class="form-control">
                </div>
                

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                                Update Site Setting
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop