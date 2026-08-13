<x-front.main-layout>
    <section class="location-overview-area padding-top-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="overview-list step-list">
                        <li class="list active">
                            <a class="list-click" href="javascript:void(0)">
                                <span class="list-number">1</span> Address Information
                            </a>
                        </li>
                        <li class="list">
                            <a class="list-click" href="javascript:void(0)">
                                <span class="list-number">2</span> Booking Summary
                            </a>
                        </li>
                    </ul>

                    <fieldset class="padding-top-30 padding-bottom-40">
                        @guest
                            <div class="Info-overview padding-top-30" style="color: #333333; font-size: 16px;">
                                Already have an account?
                                <a href="login?redirect=booking" style="color: #2c9fe0;">please login.</a>
                            </div>
                        @endguest

                        {{-- 🔴 Display all validation errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0" style="list-style: disc; padding-left: 20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @auth

                            <form id="msform" action="{{ route('front.details.store') }}" method="POST" class="msform">
                                @csrf
                                <div class="Info-overview padding-top-30">
                                    <h4 class="date-time-title"> Account Information: </h4>

                                    <div class="single-info-overview margin-top-30">
                                        <div class="single-info-input">
                                            <label class="info-title"> Mobile Number* </label>
                                            <input class="form--control" style="width: 52px; padding-left: 10px; padding-right: 10px;" type="text" value="+971" disabled>
                                            <input class="form--control" style="width: calc(90% - 52px);" type="tel" name="phone"
                                                pattern="5[0-9]{8}" maxlength="9" required
                                                placeholder="Enter Mobile Number"
                                                title="Please enter 9 digit number start with 5"
                                                value="{{ old('phone') }}">
                                        </div>
                                        <div class="single-info-input">
                                            <label class="info-title">Age* </label>
                                            <input class="form--control" autocomplete="off" type="number" max="120"
                                                min="18" name="age" required placeholder="Enter Your Age"
                                                value="{{ old('age') }}">
                                        </div>
                                    </div>

                                    <h4 class="date-time-title margin-top-30" id="bcont"> Contact Information: </h4>
                                    <div class="single-info-overview margin-top-30">
                                        <div class="single-info-input">
                                            <label class="info-title"> Apartment/Villa No.* </label>
                                            <input class="form--control" type="number" min="1" name="address1" required
                                                placeholder="Enter Apartment/Villa No."
                                                value="{{ old('address1') }}">
                                        </div>
                                        <div class="single-info-input">
                                            <label class="info-title"> Your Area* </label>
                                            <select name="state" id="state" required>
                                                @forelse ($areas as $area)
                                                    <option value="{{ $area->id }}" {{ old('state') == $area->id ? 'selected' : '' }}>
                                                        {{ $area->name }}
                                                    </option>
                                                @empty
                                                    <option value="">No Areas Available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="single-info-overview margin-top-30">
                                        <div class="single-info-input">
                                            <label class="info-title"> City* </label>
                                            <input class="form--control" type="text" name="city" required
                                                placeholder="Enter your City" value="Dubai" readonly>
                                        </div>
                                        <div class="single-info-input">
                                            <label class="info-title"> PO Box </label>
                                            <input class="form--control" type="number" name="po_box"
                                                placeholder="Enter PO Box" value="{{ old('po_box') }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="margin-top-20 action-button"> Next </button>
                            </form>
                        @endauth
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
</x-front.main-layout>