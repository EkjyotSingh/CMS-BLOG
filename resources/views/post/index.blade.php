@extends('layouts.app')
@section('content')
    <div class="col-md-9">
        @if(!Request::is('trashed'))
            <div class="mb-3">
                <a href ="{{route('post.create')}}" class="btn btn-success">Add Post</a>
            </div>
        @endif
        <div class="card">
            <h5 class="card-header text-center ">
                @if(!Request::is('trashed'))
                    Posts
                @else
                Trashed Posts
                @endif
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    @if($posts->count()>0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Published At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1?>
                                @foreach( $posts as $post)
                                    <tr>
                                        <td class="align-middle">{{$i++}}</td>
                                        <td class="align-middle">{{$post->title}}</td>
                                        <td class="align-middle"><img src="{{asset('storage/post/'.$post->image)}}" style="width:80px; height:50px;"></td>
                                        <td class="align-middle">{{$post->category->name}}</td>
                                        <td class="align-middle">{{$post->published_at}}</td>
                                        <td class="align-middle">
                                            @if(!$post->trashed())
                                                <a class="btn btn-primary" href="{{route('post.edit',$post->id)}}">Edit</a>
                                            @else
                                                <form action="{{route('post.restore',$post->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary" type="submit">Restore</button>
                                                </form>
                                            @endif
                                            <form class="d-inline" action="{{route('post.destroy',$post->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">{{$post->trashed()?'Delete':'Trash'}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">No Posts yet!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection