@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/trix.css')}}">
@endsection
@section('content')
<div class="col-md-9">
    <div class="card">
        <h5 class="card-header text-center ">
           {{isset($post)?'Edit Post':'Add Post'}}
        </h5>
        <div class="card-body">
            <form action="{{isset($post)?route('post.update',$post->id):route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="">Title</label>
                    <input class="form-control @error('title') border border-danger @enderror" name="title" type="text" placeholder="Title"
                    value="{{isset($post)?$post->title:''}}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control @error('description') border border-danger @enderror" row="5" column="5" name="description" type="text" placeholder="Description">{{isset($post)?$post->description:''}}</textarea>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <input id="text" type="hidden" name="content" value="{{isset($post)?$post->content:''}}">
                    <trix-editor input="text"class="@error('content') border border-danger @enderror" placeholder="Content"></trix-editor>
                    @error('content')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Published At</label>
                    <input class="form-control @error('published_at') border border-danger @enderror" name="published_at" type="datetime-local" placeholder="Published At"
                    value="{{isset($post)?$post->published_at:''}}">
                    @error('published_at')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                @if($tags->count()>0)
                    <div class="form-group">
                        <label for="">Tags</label>
                        <select class="form-control " name="tag[]" multiple>
                            @foreach($tags as $tag)
                                <option 
                                @if(in_array($tag->id,$post->tags->pluck('id')->toarray()))
                                    selected
                                @endif
                                value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control @error('category_id') border border-danger @enderror" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($post))
                                    @if($category->id== $post->category_id)
                                    selected
                                    @endif
                                @endif
                                >{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input class="form-control @error('image') border border-danger @enderror" name="image" type="file" placeholder="Image"
                    value="{{isset($post)?$post->image:''}}">
                    @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($post)?'Update Post':'Add Post'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/trix.js')}}"></script>
@endsection