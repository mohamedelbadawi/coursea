@extends('layouts.app')
<title>profile settings</title>

@section('css')
    <link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('plugins/tagInput/tags-input.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .tags-input-wrapper input {
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')
    <div class="account-settings-container layout-top-spacing">
        <form action="{{ route('instructor.update.profile_settings', $instructor->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">
                                <div class="info">

                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" name="image"
                                                            class="dropify"
                                                            data-default-file="@if (isset($instructor->media->name)) {{ asset('images/instructors/' . $instructor->media->name) }}@else{{ asset('assets/img/90x90.jpg') }} @endif"
                                                            data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload
                                                            Picture</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Full Name</label>
                                                                    <input type="text"
                                                                        class="form-control mb-4 @error('name') border-danger @enderror"
                                                                        name="name" id="fullName"
                                                                        placeholder="Full Name"
                                                                        value="{{ $instructor->name }}">
                                                                    @error('name')
                                                                        <small class="text-danger">
                                                                            {{ $message }}
                                                                        </small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="dob-input">Date of Birth</label>
                                                                <div class="d-sm-flex d-block">
                                                                    <input type="date" name="birth_date"
                                                                        value="{{ $instructor->birth_date }}"
                                                                        class="form-control">
                                                                    @error('birth_date')
                                                                        <small class="text-danger">
                                                                            {{ $message }}
                                                                        </small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="form-group">
                                                            <label for="profession">Profession</label>
                                                            <input type="text" class="form-control mb-4" id="profession"
                                                                placeholder="ex.Designer"
                                                                value="{{ $instructor->profession }}" name="profession">
                                                            @error('profession')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="about" class="section about">
                                <div class="info">
                                    <h5 class="">About</h5>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="form-group">
                                                <label for="aboutBio">Bio</label>
                                                <textarea class="form-control" id="aboutBio" name="bio" placeholder="Tell something interesting about yourself"
                                                    rows="10">{{ $instructor->bio }}</textarea>
                                                @error('bio')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="contact" class="section contact">
                                <div class="info">
                                    <h5 class="">Contact</h5>
                                    <div class="row">
                                        <div class="col-md-11 mx-auto">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control mb-4" id="address"
                                                            placeholder="Address" value="{{ $instructor->address }}"
                                                            name="address">
                                                        @error('address')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control mb-4" id="phone"
                                                            name="phone" placeholder="Write your phone number here"
                                                            value="{{ $instructor->phone }}">
                                                        @error('phone')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control mb-4" id="email"
                                                            placeholder="Write your email here"
                                                            value="{{ $instructor->email }}" name="email">
                                                        @error('email')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="social" class="section social">
                                <div class="info">
                                    <h5 class="">Social</h5>
                                    <div class="row">

                                        <div class="col-md-11 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group social-linkedin mb-3">
                                                        <div class="input-group-prepend mr-3">
                                                            <span class="input-group-text" id="linkedin"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-linkedin">
                                                                    <path
                                                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                                    </path>
                                                                    <rect x="2" y="9" width="4"
                                                                        height="12"></rect>
                                                                    <circle cx="4" cy="4" r="2">
                                                                    </circle>
                                                                </svg></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="linkedin Username" name="linkedin"
                                                            aria-label="Username" aria-describedby="linkedin"
                                                            value="{{ $instructor->linkedin }}">
                                                        @error('linkedin')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-group social-tweet mb-3">
                                                        <div class="input-group-prepend mr-3">
                                                            <span class="input-group-text" id="tweet"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-twitter">
                                                                    <path
                                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                                    </path>
                                                                </svg></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Twitter Username" aria-label="Username"
                                                            name="twitter" aria-describedby="tweet"
                                                            value="{{ $instructor->twitter }}">
                                                        @error('twitter')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-11 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group social-fb mb-3">
                                                        <div class="input-group-prepend mr-3">
                                                            <span class="input-group-text" id="fb"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-facebook">
                                                                    <path
                                                                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                                    </path>
                                                                </svg></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Facebook Username" aria-label="Username"
                                                            name="facebook" aria-describedby="fb"
                                                            value="{{ $instructor->facebook }}">
                                                        @error('facebook')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-group social-github mb-3">
                                                        <div class="input-group-prepend mr-3">
                                                            <span class="input-group-text" id="github"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-github">
                                                                    <path
                                                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                                    </path>
                                                                </svg></span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Github Username" aria-label="Username"
                                                            aria-describedby="github" value="{{ $instructor->github }}"
                                                            name="github">
                                                        @error('github')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mb-5">
                            <div class="info">
                                <div id="badgeTags" class="col-lg-12 mx-auto layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>Skills</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area text-center tags-content">
                                            <div>
                                                <label for="">Enter the skill</label>
                                                <input type="text" id="skill-input" name="skills" placeholder="">
                                                @error('skills')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="account-settings-footer">

                <div class="as-footer-container">

                    {{-- <div class=""></div> --}}
                    <button id="multiple-reset" class="btn btn-warning">Reset All</button>
                    <div class="blockui-growl-message">
                        <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                    </div>
                    <button id="multiple-messages" class="btn btn-primary" type="submit">Save Changes</button>

                </div>

            </div>
    </div>
    </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('plugins/tagInput/tags-input.js') }}"></script>
    <script>
        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
        var instance = new TagsInput({
            selector: 'skill-input'
        });

        var data = [
            @foreach ($skills as $skill)
                ["{{ $skill }}"],
            @endforeach
        ];

        if (data.length > 0 && data[0] != '') {
            instance.addData(data)
        }
    </script>
@endsection
