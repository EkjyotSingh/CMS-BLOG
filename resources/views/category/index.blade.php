@extends('layouts.app')
@section('content')
    <div class="col-md-9">
        <div class="mb-3">
            <a href ="{{route('category.create')}}" class="btn btn-success">Add Category</a>
        </div>
        <div class="card">
            <h5 class="card-header text-center ">
                Categories
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    @if($categories->count()>0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Total Posts</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1?>
                                @foreach( $categories as $category)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->posts->count()}}</td>
                                        <td>
                                        <a class="btn btn-primary "href="{{route('category.edit',$category->id)}}">Edit</a>

                                            <form class="d-inline" action="{{route('category.destroy',$category->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">No Categories yet!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection