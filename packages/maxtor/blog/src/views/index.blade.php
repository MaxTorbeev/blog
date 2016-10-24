@extends('layouts.app')

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
                        <li><span class="post-author"><a href="#"><i class="fa fa-user"></i> Eftakher Alam</a></span></li>
                        <li><span class="post-date"><a href="#"><i class="fa fa-calendar"></i> 25 Aug 2015</a></span></li>
                        <li><span class="post-comment"><a href="#"><i class="fa fa-tags"></i> Web design</a></span></li>
                    </ul>
                </div><!-- /.entry-header -->

                <div class="entry-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates accusamus est veniam ducimus reiciendis, tenetur minus, possimus animi vel molestiae cupiditate labore deleniti debitis distinctio libero qui consequatur laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, id, magni.</p>
                </div><!-- /.entry-content -->
            </div><!-- /.blog-content -->

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