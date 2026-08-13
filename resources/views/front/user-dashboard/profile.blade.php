<x-front.main-layout>
    <div class="overlays"></div>
    <div class="banner-inner-area section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents">
                        <ul class="inner-menu">
                            <li class="list"><a href="/"> Home </a></li>
                            <li class="list"><a href="{{ route('front.dashboard') }}">Dashboard</a></li>
                            <li class="list">Profile</li>
                        </ul>
                        <!--<h1 class="banner-inner-title"> Dashboard </h1>-->
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
                                <h2 class="dashboards-title"> Edit Profile </h2>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edit-profile">
                                <div class="profile-info-dashboard">
                                    <div class="dashboard-profile-flex">
                                        <div class="dashboard-address-details">
                                            <form id="msform" action="{{ route('front.profile-update') }}" method="POST" class="msform"
                                                onsubmit="return chkform(this);">
                                                @csrf
                                                <div class="single-dashboard-input">
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> First Name* </label>
                                                        <input class="form--control" type="text" pattern="[A-Za-z]{2,}"
                                                            title="Letters only" required name="first_name"
                                                            value="{{ explode(' ', $user->name)[0] }}"  placeholder="Type Your Name">
                                                    </div>
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> Last Name* </label>
                                                        <input class="form--control" pattern="[A-Za-z]{2,}"
                                                            title="Letters only" type="text" required name="last_name"
                                                            value="{{ explode(' ', $user->name)[1] }}"  placeholder="Type Your Name">
                                                    </div>

                                                </div>
                                                <div class="single-dashboard-input">
                                                    {{-- <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> Email* </label>
                                                        <input class="form--control" type="email" name="email"
                                                            value="khaledyoosef94@gmail.com" disabled
                                                            placeholder="Type Your Email">
                                                    </div> --}}
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> Mobile Number* </label>
                                                        <input class="form--control"
                                                            style="width: 52px; padding-left: 10px; padding-right: 10px;"
                                                            type="text" value="+971" disabled><input
                                                            class="form--control" style="width: calc(100% - 52px);"
                                                            type="tel" name="phone" pattern="5[0-9]{8}" maxlength="9"
                                                            required placeholder="Enter Mobile Number"
                                                            title="Please enter 9 digit number start with 5" value="{{ $user->details?->phone }}">
                                                    </div>
                                                </div>
                                                <div class="single-dashboard-input">
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title">Age </label>
                                                        <input class="form--control" autocomplete="off" type="number"
                                                            max="120" min="18" name="dob" required
                                                            placeholder="Enter Your Age" value="{{ $user->details?->age }}">
                                                    </div>
                                                    <div class="single-info-input margin-top-30">
                                                    </div>
                                                </div>
                                                <div class="single-dashboard-input">
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> Apartment/Villa No* </label>
                                                        <input class="form--control" type="text" required
                                                            name="address1" value="{{ $user->details?->apartment_number }}"
                                                            placeholder="Type Apartment/Villa No">
                                                    </div>
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> Area* </label>
                                                        <select name="state" id="state" required>
                                                            <option value="">Select Area</option>
                                                            @foreach ($areas as $area)
                                                                <option value="{{ $area->id }}" 
                                                                    @selected($area->name == $user->details?->area)>{{$area->name}}</option>    
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="single-dashboard-input">
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> City* </label>
                                                        <input class="form--control" type="text" pattern="[a-zA-Z\s]*"
                                                            title="Letters only" required name="city" 
                                                            value="{{ $user->details?->city }}" placeholder="Your City">
                                                    </div>
                                                    <div class="single-info-input margin-top-30">
                                                        <label class="info-title"> PO Box </label>
                                                        <input class="form--control" type="text" pattern="[0-9]+"
                                                            title="Numbers only" name="zip" value="{{ $user->details?->po_box }}"
                                                            placeholder="Enter PO Box">
                                                    </div>
                                                </div>

                                                <div class="btn-wrapper margin-top-35">
                                                    <button type="submit" class="margin-top-20 cmn-btn btn-bg-1"> Save
                                                        Changes </button>
                                                </div>
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
    <link href="admin/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />
            </div>
        </div>
    </div>
</x-front.main-layout>
