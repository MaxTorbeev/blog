@extends('mxtcore::layouts.app')

@section('content')

    @foreach($posts as $post)
        <article class="post-wrapper">
            <header class="featured-wrapper">
                <a href="#"><img src="assets/images/blog/blog-3.jpg" class="img-responsive " alt="Image"></a>
            </header><!-- /.featured-wrapper -->

            <div class="blog-content">
                <div class="entry-header">
                    <h2 class="entry-title"><a href="{{ route('post.show',  ['id' => $post->alias]) }}">{{ $post->title }}</a></h2>
                    <ul class="entry-meta clearfix">
                        <li><span class="post-author"><a href="#">{{ $post->user->name }}</a></span></li>
                        <li><span class="post-date"><a href="#">{{ $post->created_at }}</a></span></li>
                    </ul>
                </div>

                <div class="entry-content">
                    {{ $post->intro_text }}
                </div>
            </div>

            <footer class="entry-footer clearfix">
                <ul class="entry-meta pull-left">
                    <li><span class="post-comments"><a href="#"><i class="fa fa-comments"></i> 15</a></span></li>
                    <li><span class="like"><a href="#"><i class="fa fa-thumbs-o-up"></i> 320</a></span></li>
                    <li><span class="share"><a href="#"><i class="fa fa-share"></i> Share</a></span></li>
                </ul>
                <a class="readmore pull-right" href="#">Read More</a>
            </footer>
        </article>

    @endforeach
@endsection