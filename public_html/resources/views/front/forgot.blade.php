<x-front.main-layout>
    <div class="overlays"></div>
    <div class="banner-inner-area section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents">
                        <ul class="inner-menu">
                            <li class="list"><a href="/"> Home </a></li>
                            <li class="list">Forgot Password</li>
                        </ul>
                        <h1 class="banner-inner-title"> Forgot Password </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="signup-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="signup-wrapper">
                <div class="signup-contents">
                    <h3 class="signup-title"> Forgot Password </h3>
                    <form class="signup-forms" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="single-signup margin-top-30">
                            <label class="signup-label"> Your Email* </label>
                            <input class="form--control" type="email" name="email" onkeyup="return forceLower(this);"
                                required placeholder="Enter Your Email">
                        </div>
                        <button type="submit"> Send Reset Link </button>
                        <span class="bottom-register"> Don't have Account? <a class="resgister-link" href="register">
                                Register </a> </span>
                        <input type="hidden" name="type" value="forgot">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-front.main-layout>