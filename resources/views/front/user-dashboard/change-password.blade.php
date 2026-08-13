<x-front.main-layout>
    <div class="overlays"></div>
    <style>
        .glyphicon-remove {
            color: #000000;
        }

        .glyphicon-ok {
            color: #1dbf73;
        }

        .glyphicon-remove:before {
            content: "\f057";
            font-family: 'Line Awesome Free';
            margin-right: 5px;
            font-size: 16px;
        }

        .glyphicon-ok:before {
            content: "\f058";
            font-family: 'Line Awesome Free';
            margin-right: 5px;
            font-size: 16px;
        }

        .box-password {
            position: relative;
        }

        .box-password .show-pass,
        .box-password .show-pass2,
        .box-password .show-pass3 {
            position: absolute;
            right: 16px;
            top: 16px;
            cursor: pointer;
            font-size: 20px;
        }

        .box-password .show-pass .la-eye,
        .box-password .show-pass2 .la-eye,
        .box-password .show-pass3 .la-eye {
            display: none;
        }

        .box-password .show-pass.active .la-eye,
        .box-password .show-pass2.active .la-eye,
        .box-password .show-pass3.active .la-eye {
            display: inline-block;
        }

        .box-password .show-pass.active .la-eye-slash,
        .box-password .show-pass2.active .la-eye-slash,
        .box-password .show-pass3.active .la-eye-slash {
            display: none;
        }
    </style>
    <div class="banner-inner-area section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents">
                        <ul class="inner-menu">
                            <li class="list"><a href="/"> Home </a></li>
                            <li class="list"><a href="{{ route('front.dashboard') }}">Dashboard</a></li>
                            <li class="list">Change Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-area dashboard-padding">
        <div class="container-fluid">
            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                <x-front.user-dashboard.side-bar />
                <div class="dashboard-right">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings dashboard-flex-shwing">
                                <h2 class="dashboards-title"> Change Password </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="edit-profile">
                                <div class="profile-info-dashboard">
                                    <div class="dashboard-profile-flex">
                                        <div class="dashboard-address-details">
                                            <form id="msform" action="{{ route('front.change-password') }}"
                                                method="POST" class="msform" onsubmit="return CheckPassword(this);">
                                                @csrf
                                                @method('PUT')
                                                <div class="single-dashboard-input">
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> Old Password* </label>
                                                        <div class="box-password">
                                                            <input class="form--control password-field3" type="password"
                                                                required name="old_password"
                                                                placeholder="Type Password">
                                                            <span class="show-pass3">
                                                                <i class="la la-eye"></i>
                                                                <i class="la la-eye-slash"></i>
                                                            </span>
                                                        </div>
                                                        @error('old_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="single-dashboard-input">
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> New Password* </label>
                                                        <div class="box-password">
                                                            <input class="form--control password-field" type="password"
                                                                id="pass" required name="new_password"
                                                                placeholder="Type Password">
                                                            <span class="show-pass">
                                                                <i class="la la-eye"></i>
                                                                <i class="la la-eye-slash"></i>
                                                            </span>
                                                        </div>
                                                        @error('new_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> Confirm Password* </label>
                                                        <div class="box-password">
                                                            <input class="form--control password-field2" type="password"
                                                                id="cnfpass" required name="cnf_password"
                                                                placeholder="Retype Password">
                                                            <span class="show-pass2">
                                                                <i class="la la-eye"></i>
                                                                <i class="la la-eye-slash"></i>
                                                            </span>
                                                        </div>
                                                        @error('cnf_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="single-forms margin-top-30">
                                                    <div class="single-content">
                                                        <div id="Length" class="glyphicon glyphicon-remove">Must be
                                                            at least 8 charcters</div>
                                                        <div id="UpperCase" class="glyphicon glyphicon-remove">Must
                                                            have atleast 1 alphabet case
                                                            character</div>
                                                        <div id="Numbers" class="glyphicon glyphicon-remove">Must
                                                            have atleast 1 numeric character
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-wrapper margin-top-10" id="wpass"
                                                    style="color:#ff0000;display:none;">
                                                    Password should be minimum 8 characters which contain at least one
                                                    alphabet and one numeric
                                                    digit.
                                                </div>
                                                <div class="btn-wrapper margin-top-35">
                                                    <button type="submit" class="margin-top-20 cmn-btn btn-bg-1">
                                                        Save Changes </button>
                                                </div>
                                                <input type="hidden" name="type" value="update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-front.main-layout>
