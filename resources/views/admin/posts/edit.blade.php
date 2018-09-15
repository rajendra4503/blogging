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
                  Update post :  <b>{{$post->title}}</b>
            </div>

            <div class="panel-body">
            <form action="{{route('update.post',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label for="title">Title</label>
                              <input value="{{$post->title}}" type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="featured">Category</label>
                              <select name="category_id" class="form-control">
                                <option>Select Category</option>     
                               @foreach($categories as $category)
                                    <option  @if($category->id == $post->category_id ) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach
                              </select>
                        </div>
                        <div class="form-group">                       
                            <img class="img-thumbnail" width="150" src="{{$post->featured}}">
                        </div>

                        <div class="form-group">
                            <label for="featured">Featured image</label>
                            <input type="file" name="featured" class="form-control">
                        </div>

                        <div class="form-group">
                              <label for="content">Content</label>
                              <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
                        </div>

                        <div class="form-group">
                              <div class="text-center">
                                    <button class="btn btn-success" type="submit">
                                          Update Post
                                    </button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
@stop