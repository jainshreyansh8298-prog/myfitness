<div class="banner-area home-two-banner" loading="lazy">
    <div class="container container-two">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-2">
            </div>
            <div class="col-xl-8">
                <div class="banner-contents style-02">
                    <h1 class="banner-title"> <span class="span-shape">Fitness</span> At Your Doorstep </h1>
                    <span class="title-top"> Experience fitness delivered to you - at your home or online! </span>
                    <div class="banner-bottom-content">
                            <form action="{{ route('front.services') }}" method="GET" class="banner-search-form">
                                @csrf
                                <div class="banner-address-select" id="subl">
                                    <select name="area_id" required>
                                        <option disabled selected value="">Select Area</option>
                                        @foreach ($areas  as $area)
                                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="banner-address-select">
                                <select name="category_id" class="nice-select" required onchange="this.form.submit()">
                                    <option data-display="Find Service" disabled selected value="">Find
                                    </option>
                                    @foreach ( $services as $service )
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="banner-button">
                                <a href="javascript:void(0);" onclick="this.form.submit()">
                                    <img src="{{ asset('assets/img/mglass.png') }}" alt=""></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
            </div>
        </div>
    </div>
    <div class="bannerover"></div>
</div>
