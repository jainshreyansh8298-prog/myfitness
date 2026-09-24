<x-front.main-layout>
    <div class="overlays"></div>
    <div class="banner-inner-area section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents">
                        <ul class="inner-menu">
                            <li class="list"><a href="/"> Home </a></li>
                            <li class="list">Verify Email</li>
                        </ul>
                        <h1 class="banner-inner-title"> Verify Email </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="signup-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="signup-wrapper">
                <div class="signup-contents">
                    <h3 class="signup-title"> Verify Your Email </h3>
                    <p class="margin-bottom-30">
                        Thanks for signing up! Before getting started, please verify your email address by
                        clicking on the link we just emailed to you. If you didn't receive the email, click
                        below to have another one sent.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success margin-bottom-30">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="signup-forms" action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button type="submit"> Resend Verification Email </button>
                    </form>

                    <form class="signup-forms margin-top-20" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"> Log Out </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-front.main-layout>
