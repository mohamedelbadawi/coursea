@extends('layouts.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">


            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="page-header mb-4">
                        <nav class="breadcrumb-one">
                            <div class="title">
                                <h3>My Learning</h3>
                            </div>

                        </nav>


                    </div>

                    <div class="row app-notes layout-top-spacing" id="cancel-row">
                        <div class="col-lg-12">
                            <div class="app-hamburger-container">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-menu chat-menu d-xl-none">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg></div>
                            </div>

                            <div class="app-container">

                                <div class="app-note-container">

                                    <div class="app-note-overlay"></div>

                                    <div class="tab-title">
                                        <div class="row">


                                        </div>
                                    </div>

                                    <div id="ct" class="note-container note-grid mb-5">
                                        @foreach ($courses as $course)
                                            <div class="card m-2 col-xs-4" style="width: 18rem;">
                                                <img class="card-img-top"
                                                    src="@if (isset($course->header_image)) {{ asset('images/courses/' . $course->header_image) }} @else {{ asset('assets/img/200x200.jpg') }} @endif"
                                                    height="200px" width="200px" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->title }}</h5>
                                                    <p class="card-text">{{ $course->description }}</p>
                                                    <a href="{{ route('student.view_course', $course->id) }}"
                                                        class="btn btn-primary">view course</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>

                </div>

            </div>
        @endsection
