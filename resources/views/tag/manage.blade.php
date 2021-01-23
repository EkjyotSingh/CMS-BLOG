@extends('layouts.app')
@section('content')
<div class="col-md-9">
    <div class="card">
        <h5 class="card-header text-center ">
           {{isset($tag)?'Edit Tag':'Add Tag'}}
        </h5>
        <div class="card-body">
            <form action="{{isset($tag)?route('tag.update',$tag->id):route('tag.store')}}" method="post">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control @error('name') border border-danger @enderror" name="name" type="text" placeholder="Name"
                    value="{{isset($tag)?$tag->name:''}}">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($tag)?'Update Tag':'Add Tag'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection