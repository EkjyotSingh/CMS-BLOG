@extends('layouts.app')
@section('content')
<div class="col-md-9">
    <div class="card">
        <h5 class="card-header text-center ">
           {{isset($category)?'Edit Category':'Add Category'}}
        </h5>
        <div class="card-body">
            <form action="{{isset($category)?route('category.update',$category->id):route('category.store')}}" method="post">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control @error('name') border border-danger @enderror" name="name" type="text" placeholder="Name"
                    value="{{isset($category)?$category->name:''}}">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($category)?'Update Category':'Add Category'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection