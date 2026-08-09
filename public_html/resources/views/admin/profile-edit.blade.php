<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Edit Profile') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admins.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4 shadow card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('Name *') }}</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::user()->name }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('Email *') }}</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Profile Image') }}</label>
                            <div>
                                <img id="profileImage" src="{{asset('storage/'.Auth::user()->image) }}"
                                    class="w_200" alt="">
                            </div>
                            <input type="file" name="image" accept="image/*" />
                            <small class="form-text text-muted">{{ __('Leave blank if you don\'t want to change it.') }}</small>
                            <button type="button" class="mt-2 btn btn-outline-danger btn-sm" id="deleteImageButton">
                                {{ __('Delete Image') }}
                            </button>
                        </div>
                        <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#deleteImageButton').click(function(){
                $('#profileImage').hide();
                $('form').append('<input type="hidden" id="hidden-input" name="remove_img" value="1" >');
                $(this).hide();
            });
            $('input[name="image"]').on('change',function(e){
                const file = e.target.files[0];
                if(file){
                    const reader = new FileReader();
                    reader.onload = function (e){
                        $('#profileImage').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(file);
                    $('#hidden-input').remove();
                    $('#deleteImageButton').show();
                }
                
            });
        });
    </script>


</x-dashboard.main-layout>
