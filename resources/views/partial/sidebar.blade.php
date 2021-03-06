<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

        <h6 class="sidebar-title">Search</h6>
        <form class="input-group" action="" method="GET">
            <input type="text" class="form-control" name="search" placeholder="Search">
            <div class="input-group-addon">
            <button type="submit" class="input-group-text">
                <svg class="icon icon-search" style="width:15px;height:15px;fill:rgb(105, 102, 102)">
                    <use xlink:href="{{asset('img/sprite.svg#icon-search')}}"></use>
                </svg>
            </button>
            </div>
        </form>

        <hr>

        <h6 class="sidebar-title">Categories</h6>
        <a href="{{route('blog.index')}}">Clear all</a>
        <div class="row link-color-default fs-14 lh-24">
        @foreach($categories as $category)
            <div class="col-6"><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></div>
        @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">Top posts</h6>
        @foreach($latestposts as $post)
            <a class="media text-default align-items-center mb-5" href="{{route('blog.post',$post->slug)}}">
                <img class="rounded w-65px mr-4" src="{{asset('storage/post/'.$post->image)}}">
                <p class="media-body small-2 lh-4 mb-0">{{$post->title}}</p>
            </a>
        @endforeach

        <hr>

        <h6 class="sidebar-title">Tags</h6>
        <div class="gap-multiline-items-1">
            @foreach($tags as $tag)
                <a class="badge badge-secondary" href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
            @endforeach
        </div>

    </div>
</div>