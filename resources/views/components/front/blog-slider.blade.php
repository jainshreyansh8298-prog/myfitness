<section class="blog-area padding-top-40 padding-bottom-40 section-bg-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10">
                <div class="section-title">
                    <h2 class="title"> Recent Blog & Articles </h2>
                    <span class="section-para">
                        <p><span style="font-weight: 400;">Fitness in motion</span></p>
                    </span>
                </div>
            </div>
        </div>
        <div class="row margin-top-50">
            <div class="col-lg-12">
                <div class="services-slider dot-style-one dot-02 dot-color-02">
                    @foreach ($blogs as $blog)
                        <div class="single-blog-item wow fadeInUp" data-wow-delay=".2s">
                            <div class="single-blog style-02">
                                @php
                                    $imgUrl = str_starts_with($blog->image, 'http') ? $blog->image : asset('storage/' . $blog->image);
                                @endphp
                                <a href="{{ route('front.blogDetails',$blog->slug) }}" class="blog-thumb">
                                    <img src="{{ $imgUrl }}"
                                        alt="{{ $blog->title }}" width="350"
                                        height="auto" loading="lazy" onError="this.src='https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=600'">
                                </a>
                                <div class="blog-contents">
                                    <ul class="tags hover-color-two">
                                        <li class="list">
                                            <a href="javascript:void(0)"> <i class="las la-clock"></i> {{ $blog->created_at->format('d M Y') }}
                                            </a>
                                        </li>
                                        <li class="list">
                                            <a href="javascript:void(0)"> <i class="las la-tag"></i> {{ $blog->category?->name }} </a>
                                        </li>
                                    </ul>
                                    <h4 class="common-title-two hover-color-two"> <a
                                            href="{{ route('front.blogDetails',$blog->slug) }}">
                                            {{ $blog->title }}</a> </h4>
                                    <p class="common-para">
                                    <p>{{ $blog->excerpt }}</p>
                                </div>
                            </div>
                        </div>                  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.blog-area {
    background-color: var(--brand-bg) !important;
}
.blog-area .title, .blog-area p, .blog-area .section-para {
    color: var(--brand-text) !important;
}
.single-blog {
    background-color: var(--brand-card-bg) !important;
    border-color: var(--brand-card-border) !important;
}
.single-blog .common-title-two a, .single-blog .common-para p, .single-blog .tags a {
    color: var(--brand-text) !important;
}
</style>
