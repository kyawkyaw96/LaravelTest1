@props(['randomBlog'])
<section class="blogs_you_may_like">
    <div class="container">
        <h3 class="fw-bold my-4 text-center">Blogs You May Like</h3>
        <div class="row text-center">
            @foreach ($randomBlog as $blog)
                <x-blog-card :blog="$blog" />
            @endforeach

        </div>
    </div>
</section>
