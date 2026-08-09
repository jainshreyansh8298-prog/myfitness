<div class="dashboard-left-content">
    <div class="dashboard-close-main padding-bottom-20">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-top padding-top-20">
            <div class="author-content">
                <h4 class="title">{{ Auth::user()->name }}</h4>
            </div>
        </div>
        <div class="dashboard-bottom margin-top-20">
            <ul class="dashboard-list ">
                <li class="list @if (request()->is('user/dashboard*')) active @endif">
                    <a href="{{ route('front.dashboard') }}"> <i class="las la-th"></i> Dashboard </a>
                </li>
                <li class="list @if (request()->is('user/profile*')) active @endif">
                    <a href="{{ route('front.profile') }}"> <i class="las la-user"></i> Profile </a>
                </li>
                <li class="list @if (request()->is('user/orders*')) active @endif">
                    <a href="{{ route('front.orders') }}"> <i class="las la-tasks"></i> Orders </a>
                </li>
                <li class="list @if (request()->is('user/payments*')) active @endif">
                    <a href="{{ route('front.payments') }}"> <i class="las la-wallet"></i> Payments </a>
                </li>
                <li class="list @if (request()->is('user/change-password*')) active @endif">
                    <a href="{{ route('front.change-password') }}"> <i class="las la-cog"></i>Change Password</a>
                </li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li class="list">
                        <button type="submit"> <i class="las la-sign-out-alt"></i> Log Out </button>
                    </li>
                </form>
            </ul>

        </div>
    </div>
</div>
