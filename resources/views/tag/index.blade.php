@extends('layouts.app')
@section('content')
    <div class="col-md-9">
        <div class="mb-3">
            <a href ="{{route('tag.create')}}" class="btn btn-success">Add Tag</a>
        </div>
        <div class="card">
            <h5 class="card-header text-center ">
                Tags
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    @if($tags->count()>0)
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
                                @foreach( $tags as $tag)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$tag->name}}</td>
                                        <td>0</td>
                                        <td>
                                        <a class="btn btn-primary "href="{{route('tag.edit',$tag->id)}}">Edit</a>

                                            <form class="d-inline" action="{{route('tag.destroy',$tag->id)}}" method="post">
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
                        <h3 class="text-center">No Tags yet!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection