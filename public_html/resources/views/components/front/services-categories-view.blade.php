<section class="category-area padding-top-40 padding-bottom-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-slider dot-style-one dot-color-02">
                    @foreach ($categories as $category)
                        <div class="single-category-item wow fadeInUp" data-wow-delay=".2s">
                            <div class="single-category">
                                <div class="category-contents">
                                    <h4 class="category-title">
                                        <a href="{{ route('front.services',[
                                        'category'  =>$category->slug
                                        ]) }}"> {{ $category->name }} </a>
                                    </h4>
                                    <span class="category-para"> {{ $category->services_count }} Services</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
